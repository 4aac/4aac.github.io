window.addEventListener('load', () => {
    const header = document.getElementById('header');
    const aboutsDiv = document.getElementById('abouts-div');
    const eduDiv = document.getElementById('education-div');
    const contactDiv = document.getElementById('skills-contact');

    const updateSize = () => {
        const headerRect = header.getBoundingClientRect();
        const newWidth = `${headerRect.width}px`;

        aboutsDiv.style.width = newWidth;
        eduDiv.style.width = newWidth;
        contactDiv.style.width = newWidth;
    };

    // Update size on load
    updateSize();

    // Update size on window resize
    window.addEventListener('resize', updateSize);
});
