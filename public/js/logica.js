document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    // Oculta el formulario de login y muestra la selección de rol
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('roleSelection').style.display = 'block';
});

document.getElementById('roleSubmit').addEventListener('click', function() {
    const selectedRole = document.querySelector('input[name="rol"]:checked').value;

    if (selectedRole === 'admin') {
        window.location.href = '/admin';
    } else if (selectedRole === 'cliente') {
        window.location.href = '/cliente';
    }
});
