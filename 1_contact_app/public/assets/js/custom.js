(() => {
    const filterForm = document.getElementById('filter');

    if (filterForm) {

        const resetButton = document.getElementById('reset-button');

        filterForm.company_id.addEventListener('change', () => { 
            filterForm.submit();
        } );

        if (resetButton) {
            resetButton.addEventListener('click', () => {
                filterForm.company_id.value = '';
                filterForm.search.value = '';
            });
        }
    }
})()