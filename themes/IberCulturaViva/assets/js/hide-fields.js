// Hide Brazilian states
window.setTimeout(function() {
    document.querySelectorAll('p').forEach(function(p) {
        if (p.querySelectorAll('#En_Estado').length) {
            p.style.display = 'none';
        }
    });
}, 1000);
