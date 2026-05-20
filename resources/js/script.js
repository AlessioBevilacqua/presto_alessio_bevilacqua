window.confirmDelete = function() {
    if (confirm('Sei sicuro di voler eliminare questo prodotto?')) {
        Livewire.dispatch('deleteArticle');
    }
}

