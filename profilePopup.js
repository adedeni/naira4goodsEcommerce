document.addEventListener('DOMContentLoaded', function() {
    let modalProfile = document.getElementById('profilePopup');
    let btn = document.getElementById('myProfileLink');
    let span = document.querySelector('#profilePopup .close');
    btn.onclick = function(e) {
        e.preventDefault();
        modalProfile.style.display = 'block';
    }
    span.onclick = function() {
        modalProfile.style.display = 'none';
        window.location.href = 'userDashboard.php';
    }
    window.onclick = function(e) {
        if (e.target == modalProfile) {
            modalProfile.style.display = 'none';
            window.location.href = 'userDashboard.php';
        }
    }
     const urlParams = new URLSearchParams(window.location.search);
    const modalStatus = urlParams.get('modalStatus');
    if(modalStatus === 'open'){
            modalProfile.style.display = 'block';
    }
});
