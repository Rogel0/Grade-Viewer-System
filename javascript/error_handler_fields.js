function validateMinMax(input, min, max) {
    var value = parseFloat(input.value);
    if (value < min || value > max) {
        input.setCustomValidity('Please enter a number between ' + min + ' and ' + max + '.');
    } else {
        input.setCustomValidity('');
    }
}

