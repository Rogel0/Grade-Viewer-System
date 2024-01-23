// window.onload = function() {
//     console.log('Page loaded'); // Debug message
//     setTimeout(function() {
//         var element = document.getElementById('success-message');
//         console.log('Element:', element); // Debug message
//         if (element) {
//             element.style.display = 'none';
//         }
//     }, 5000);  // 5000 milliseconds = 5 seconds
// };

// var observer = new MutationObserver(function(mutations) {
//     mutations.forEach(function(mutation) {
//         if (mutation.addedNodes.length) {
//             var element = document.getElementById('success-message');
//             console.log('Element:', element); // Debug message
//             if (element) {
//                 setTimeout(function() {
//                     element.style.display = 'none';
//                 }, 5000);  // 5000 milliseconds = 5 seconds
//             }
//         }
//     });
// });

// // Start observing the document with the configured parameters
// observer.observe(document, { childList: true, subtree: true });

window.onload = function() {
    let alert = document.querySelector('.alert');
    if (alert) {
        setTimeout(function() {
            alert.style.display = 'none';
        }, 5000); // Hide the alert after 5 seconds
    }
};