CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'styles', groups: [ 'styles' ] },
        { name: 'insert', groups: [ 'insert' ] },
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'about', groups: [ 'about' ] },
		{ name: 'colors', groups: [ 'colors' ] }
	];
	config.removeButtons = 'Underline,Subscript,Superscript,About,Cut,Copy,Paste,PasteText,PasteFromWord,HorizontalRule,Scayt,Anchor,Format';
};

// Стили сайта
CKEDITOR.config.contentsCss = '/assets/app.css';

// Язык
CKEDITOR.config.defaultLanguage = 'ru';

// Стили внутренней области редактора
CKEDITOR.addCss( 'body { padding: 2px 8px; font-family: serif; font-size: 20px; line-height: 1.6; }' );

// Жирный текст
CKEDITOR.config.coreStyles_bold =
{
    element : 'strong',
    attributes : { 'class' : 'text text--bold' }
};

// Курсивный текст
CKEDITOR.config.coreStyles_italic =
{
    element : 'i',
    attributes : { 'class' : 'text text--italic' }
};

// Зачеркнутый текст
CKEDITOR.config.coreStyles_strike =
{
    element : 'span',
    attributes : { 'class' : 'text text--strike' },
    overrides : 'strike'
};

// Подчеркнутый текст
CKEDITOR.config.coreStyles_underline =
{
    element : 'span',
    attributes : { 'class' : 'text--underline' }
};

// Стили
CKEDITOR.stylesSet.add( 'default', [
    // Блочные эелемнты
    { name: 'Заголовок 1',  element: 'h2', attributes: { 'class': 'title title--xl' } },
    { name: 'Заголовок 2',  element: 'h3', attributes: { 'class': 'title title--l' } },
    { name: 'Заголовок 3',  element: 'h4', attributes: { 'class': 'title title--m' } },
    { name: 'Ведущий текст',  element: 'p', attributes: { 'class': 'text text--lead' } },
    // Строчные элементы
    { name: 'Жёлтый маркер', element: 'span', attributes: { 'class': 'text text--marker' } },
]);

// Загрузка файлов
CKEDITOR.config.filebrowserImageUploadUrl = '/uploads/ckeditor/image';
