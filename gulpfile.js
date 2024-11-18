import yargs from 'yargs';
import gulp from 'gulp';
import cleanCss from 'gulp-clean-css';
import dartSass from 'sass'
import gulpSass from 'gulp-sass'
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';


// const PRODUCTION = yargs.argv.prod;
const sass = gulpSass(dartSass)
const y = yargs();
const PRODUCTION = y.argv.prod;

const paths = {
    styles: {
        src: ['src/assets/scss/bundle.scss', 'src/assets/scss/admin.scss'],
        dest: 'dist/assets/css'
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

export const watch = () => {
    console.log('##### IN PRODUCTION #####')
    gulp.watch('src/assets/scss/**/*.scss', styles);
}

// export default styles;