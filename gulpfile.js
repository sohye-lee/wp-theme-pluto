import yargs from 'yargs';
import gulp from 'gulp';
import cleanCss from 'gulp-clean-css';
import dartSass from 'sass'
import gulpSass from 'gulp-sass'
import gulpIf from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';


// const PRODUCTION = yargs.argv.prod;
const sass = gulpSass(dartSass)

 

export const styles = () => {
    console.log('yars: ', yargs.argv);
    return gulp.src('src/assets/scss/bundle.scss')
        .pipe(sourcemaps.init())
            .pipe(sass().on('error', sass.logError))
            .pipe(cleanCss({compatibility: 'ie8'}))
            // using gulfif, only for production
            // .pipe(gulpif(PRODUCTION, cleanCss({compatibility: 'ie8'})))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('dist/assets/css'));
}

// export default styles;