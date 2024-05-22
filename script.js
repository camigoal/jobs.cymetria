// Bootstrap JS 
document.querySelector('.search-form').addEventListener('submit', function (event) {
    console.log('Formulario enviado');
    event.preventDefault();

    var jobTitle = document.querySelector('#job-title').value.toLowerCase();
    // var jobPositions = document.querySelectorAll('.job-positions');
    var country = document.querySelector('#country').value.toLowerCase();
    var jobPostings = document.querySelectorAll('.job-posting');

    jobPostings.forEach(function (jobPosting) {
        var title = jobPosting.querySelector('.job-title').innerText.toLowerCase();
        var location = jobPosting.querySelector('.location').innerText.toLowerCase();
        if (title.includes(jobTitle) && (country === 'all' || location.includes(country))) {
            jobPosting.style.display = 'block';
        } else {
            jobPosting.style.display = 'none';
        }
    });
});

function showForm() {
    // Ocultar las posiciones de trabajo
    document.getElementById('job-positions').style.display = 'none';

    // Mostrar el formulario
    document.getElementById('application-form').style.display = 'block';
}