<?=$this->Html->css('../js/vendor/Trumbowyg/ui/trumbowyg.min', ['block'=>'scriptBottom'])?>
<?=$this->Html->script('vendor/Trumbowyg/plugins/colors/trumbowyg.colors.min', ['block'=>'scriptBottom'])?>

<?=$this->Html->scriptBlock("$('textarea').trumbowyg({
   lang:'fr',
   btns: [
        ['formatting'],
        'btnGrp-semantic',
        ['link'],
        'btnGrp-justify',
        'btnGrp-lists',
        ['fullscreen']
    ],
    resetCss: true,
    removeformatPasted: true,
    autogrow: true

});", ['block'=>'scriptBottom'])?>
