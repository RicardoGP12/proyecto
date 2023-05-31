
const users =[ {
    id: 1,
    nombre: "Harry",
    email: "harry@bluuweb.cl",
    contraseña : "123456"
},
{
    id: 2,
    nombre: "Debra",
    email: "deb@bluuweb.cl",
    contraseña: "123456"
},
{
    id: 3,
    nombre: "Dexter",
    email: "dex@bluuweb.cl",
    contraseña: "123456"
},
{
    id: 4,
    nombre: "Rita",
    email: "rita@bluuweb.cl",
    contraseña: "123456"
}]

function iniciarSesion() {
    var user_ = document.getElementById('register-email-2').value;
    var pass_ = document.getElementById('register-password-2').value;

    // console.log(user_);
    // console.log(pass_);

    var verify = !!users.find(element => element.email === user_ && element.contraseña === pass_)

    console.log(verify);

    if (verify) {
        // window.location = 'verificacion.html';
        alert('¡Correo y contraseña correctos!');
        window.location.href = "index.html";
        
    } else {
        alert('Correo o contraseña incorrecta');
    }
}