<?=$this->Html->scriptBlock("$('textarea').trumbowyg({
   lang:'fr',
   btns: [
      ['viewHTML'],
      ['formatting'],
      'btnGrp-semantic',
      ['superscript', 'subscript'],
      ['link'],
      'btnGrp-justify',
      'btnGrp-lists',
      ['horizontalRule'],
      ['removeformat'],
      ['foreColor', 'backColor'],
      ['fullscreen']

   ],
   resetCss: true,
   removeformatPasted: true,
   autogrow: true

});", ['block'=>'scriptBottom'])?>
