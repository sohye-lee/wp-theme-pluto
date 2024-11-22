import yargs from 'yargs';
import gulp from 'gulp';
import cleanCss from 'gulp-clean-css';
import dartSass from 'sass'
import gulpSass from 'gulp-sass'
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import { deleteAsync } from 'del';
import webpack from 'webpack-stream';

// const PRODUCTION = yargs.argv.prod;
const sass = gulpSass(dartSass)
const y = yargs();
const PRODUCTION = y.argv.prod;

const paths = {
    styles: {
        src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin.scss'],
        dest: 'dist/assets/css'
    },
    images: {
        src: 'src/assets/images/**/*.{jpg,png,jpeg,svg,gif}',
        dest: 'dist/assets/images'
    },
    scripts: {
        src: 'src/assets/js/bundle.js',
        dest: 'dist/assets/js'
    },
    other: {
        src: ['src/assets/**/*', '!src/assets/{images,js,scss}/**/*'],
        dest: 'dist/assets'
    }
}

export const styles = () => {
    return gulp.src(paths.styles.src)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(PRODUCTION, cleanCss({compatibility: 'ie8'})))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(gulp.dest(paths.styles.dest));
}

export const images = () => {
    return gulp.src(paths.images.src)
        .pipe(imagemin({ progressive: true }))
        .pipe(gulp.dest(paths.images.dest));
}

export const scripts = () => {
    return gulp.src(paths.scripts.src)
        .pipe(webpack({
            module: {
                rules: [
                    {
                        test: /\.js$/,
                        use: {
                            loader: 'babel-loader',
                            options: {
                                presets: ['@babel/preset-env']
                            }
                        }
                    }
                ]
            },
            output: {
                filename: 'bundle.js'
            },
            devtool: !PRODUCTION ? 'inline-source-map' : false,
            mode: PRODUCTION ? 'production' : 'development'
        }))
        .pipe(gulp.dest(paths.scripts.dest));
}

export const watch = () => {
    console.log('##### IN PRODUCTION #####')
    gulp.watch('src/assets/scss/**/*.scss', styles);
    gulp.watch('src/assets/js/**/*.js', images);
    gulp.watch(paths.scripts.src, scripts);
}

export const copy = () => {
    return gulp.src(paths.other.src)
        .pipe(gulp.dest(paths.other.dest))
}

export const clean = () => deleteAsync(['dist']);

export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, copy), watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, copy));

export default dev;