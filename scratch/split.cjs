const fs = require('fs');

const cssContent = fs.readFileSync('resources/css/style.css', 'utf-8');
const jsContent = fs.readFileSync('resources/js/main.js', 'utf-8');

const cssLines = cssContent.split('\n');
const jsLines = jsContent.split('\n');

const getLines = (lines, start, end) => lines.slice(start - 1, end).join('\n');

// CSS Splits
const baseCss = getLines(cssLines, 1, 126);
const navbarCss = getLines(cssLines, 127, 193) + '\n\n' + getLines(cssLines, 301, 340);
const heroCss = getLines(cssLines, 194, 250) + '\n\n' + getLines(cssLines, 341, 346);
const footerCss = getLines(cssLines, 251, 294) + '\n\n' + getLines(cssLines, 295, 300) + '\n\n' + getLines(cssLines, 347, 355);
const modalCss = getLines(cssLines, 357, 374);
const filterCss = getLines(cssLines, 375, 415);

fs.writeFileSync('resources/css/base.css', baseCss);
fs.writeFileSync('resources/css/navbar.css', navbarCss);
fs.writeFileSync('resources/css/hero.css', heroCss);
fs.writeFileSync('resources/css/footer.css', footerCss);
fs.writeFileSync('resources/css/modal.css', modalCss);
fs.writeFileSync('resources/css/filter.css', filterCss);

// JS Splits
const jsWrapperStart = "document.addEventListener('DOMContentLoaded', () => {\n";
const jsWrapperEnd = "\n});";

const navbarJs = jsWrapperStart + getLines(jsLines, 4, 21) + jsWrapperEnd;
const carouselJs = jsWrapperStart + getLines(jsLines, 23, 77) + jsWrapperEnd;
const modalJs = jsWrapperStart + getLines(jsLines, 79, 113) + jsWrapperEnd;
const filterJs = jsWrapperStart + getLines(jsLines, 115, 197) + jsWrapperEnd;

fs.writeFileSync('resources/js/navbar.js', navbarJs);
fs.writeFileSync('resources/js/carousel.js', carouselJs);
fs.writeFileSync('resources/js/modal.js', modalJs);
fs.writeFileSync('resources/js/filter.js', filterJs);

console.log("Split complete!");
