document.addEventListener('DOMContentLoaded', () => {
    console.log("JavaScript is ready!");
});

function showContent(event, sectionId) {    
    event.preventDefault();

    document.querySelectorAll('.content-section').forEach(section => {
        section.style.display = 'none';
    });

    document.querySelectorAll('.sidebar a').forEach(link => {
        link.classList.remove('active');
    });

    const activeSection = document.getElementById(sectionId);
    if (activeSection) {
        activeSection.style.display = 'block';
    }

    event.currentTarget.classList.add('active');
}

document.addEventListener('DOMContentLoaded', () => {
    const formStep1 = document.getElementById('career-form-step-1');
    const nextForms = document.getElementById('next-forms');

    formStep1.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Step 1 Submitted. Next Step Unlocked!');
        
        // Show the next form
        nextForms.style.display = 'block';
    });
});