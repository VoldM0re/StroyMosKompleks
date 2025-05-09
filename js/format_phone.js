function formatPhoneNumber(input) {
    let val = input.value.replace(/[^\d+]/g, '');
    if (val.startsWith('+8')) val = '+7' + val.slice(2);
    if (val.startsWith('8')) val = '+7' + val.slice(1);
    if (val.startsWith('7') && val.length > 1) val = '+7' + val.slice(1);
    if (/^\d{1,}$/.test(val)) val = '+7' + val;

    if (!val.startsWith('+')) val = '+' + val.replace(/\D/g, '');

    val = val.slice(0, 12);
    if (val.length <= 2) input.value = val;
    else {
        const digits = val.replace(/\D/g, '');
        input.value = '+7' +
            (digits[1] ? ' (' + digits.slice(1, 4) : '') +
            (digits[4] ? ') ' + digits.slice(4, 7) : '') +
            (digits[7] ? '-' + digits.slice(7, 9) : '') +
            (digits[9] ? '-' + digits.slice(9, 11) : '');
    }

    input.addEventListener('focus', () => {
        if (input.value === '') input.value = '+7 (';
    });

    input.addEventListener('blur', () => {
        if (['+7 (', '+7', '+'].includes(input.value)) input.value = '';
    });

    input.addEventListener('keydown', (e) => {
        const allowedKeys = ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'];
        if (e.key === '+' && input.selectionStart === 0) return;
        if (!/\d/.test(e.key) && !allowedKeys.includes(e.key)) e.preventDefault();
    });
}