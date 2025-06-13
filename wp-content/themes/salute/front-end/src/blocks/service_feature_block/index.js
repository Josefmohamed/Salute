import './style.scss';

export function service_feature_block() {
    const block = document.querySelector('.service_feature_block');
    if (!block) {
        console.warn('[ServiceFeatureBlock] Block not found');
        return;
    }

    const svg = block.querySelector('.section-svg');
    if (!svg) {
        console.warn('[ServiceFeatureBlock] SVG element not found inside block');
        return;
    }

    const prevSection = block.previousElementSibling;
    if (!prevSection) {
        console.warn('[ServiceFeatureBlock] Previous section not found');
        return;
    }

    let topPart = prevSection.querySelector('.content-wrapper .right-content') || prevSection;
    if (!topPart) {
        console.warn('[ServiceFeatureBlock] Top part not found');
        return;
    }

    const bottomPart = block.querySelector('.right-image-card');
    if (!bottomPart) {
        console.warn('[ServiceFeatureBlock] Bottom part not found');
        return;
    }

    const calcSvg = () => {


        const topPartBottom = topPart.getBoundingClientRect().bottom;
        const bottomPartTop = bottomPart.getBoundingClientRect().top;
        const offsetTop = block.getBoundingClientRect().top;

        // Calculate svg position relative to block
        const svgTop = offsetTop - topPartBottom + 60;
        const svgBottom = bottomPartTop - offsetTop + 40;
        const svgHeight = svgBottom + svgTop;

        svg.style.position = 'absolute';
        svg.style.top = `${-svgTop}px`;
        svg.style.height = `${svgHeight}px`;
    }
    calcSvg()
    window.addEventListener('resize', calcSvg)
}
