// function showForm() {
//     document.getElementById('apply-form').style.display = 'block';
//   }

// Bootstrap JS 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


function showForm() {
    // Ocultar las posiciones de trabajo
    document.getElementById('job-positions').style.display = 'none';

    // Mostrar el formulario
    document.getElementById('application-form').style.display = 'block';
}

document.querySelector('.search-form').addEventListener('submit', function (event) {
    console.log('Formulario enviado');
    event.preventDefault();

    var jobTitle = document.querySelector('#job-title').value;

    var jobPositions = document.querySelectorAll('.job-positions');
    jobPositions.forEach(function (jobPosition) {
        if (jobPosition.innerText.includes(jobTitle)) {
            jobPosition.style.display = 'block';
        } else {
            jobPosition.style.display = 'none';
        }
    });
});