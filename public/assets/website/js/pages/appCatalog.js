function Product (image, modal_id) {
    this.modal_id = modal_id;
    this.src = image.attr('src');
    this.ref = image.attr('data-ref');
    this.name = image.attr('data-name');
    this.description = image.attr('data-description');
    this.price = image.attr('data-price');
    this.sizes = image.attr('data-size');
    this.download = image.attr('data-download');
}

Product.prototype.getSize = function() {
    var sizesHtml = '';
    if(this.sizes)
    {
        
        sizes = this.sizes.split(',');
        sizes.forEach(function(size) {
            sizesHtml += ' <span class="label label-default">'+size+'</span>';
        });
    }
    return sizesHtml;
}

Product.prototype.show = function() {
    $('#' + this.modal_id + ' .modal-title strong').html(this.name);
    $('#' + this.modal_id + ' .modal-title span').html(this.ref);
    $('#' + this.modal_id + ' .modal-body #product-image img').attr('src', this.src);
    $('#' + this.modal_id + ' .modal-footer #download').attr('href', this.download);
    $('#' + this.modal_id + ' .modal-body #product-content #description').html(this.description);
    $('#' + this.modal_id + ' .modal-body #product-content #size').html(this.getSize());
    $('#' + this.modal_id + ' .modal-body #product-content #price').html(this.price);
}

Product.prototype.hide = function() {
    $('#' + this.modal_id + ' .modal-title strong').html('');
    $('#' + this.modal_id + ' .modal-title span').html('');
    $('#' + this.modal_id + ' .modal-body #product-image img').attr('src', '');
    $('#' + this.modal_id + ' .modal-footer #download').attr('href', '');
    $('#' + this.modal_id + ' .modal-body #product-content #description').html('');
    $('#' + this.modal_id + ' .modal-body #product-content #size').html('');
    $('#' + this.modal_id + ' .modal-body #product-content #price').html('');
}

$(document).ready(function() {
   $('#catalog img').on('click',function() {
        product = new Product($(this), 'myModal');
        product.show();             
        
        $('#myModal').modal();
        $('#myModal').on('hidden.bs.modal', function() {
            product.hide();
        });
   });  
})
