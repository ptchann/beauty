function confirmDelete(theUrl,message)
{
    if(confirm(message)){
        window.location.href=theUrl;
    }
    else
    {
        return false;
    }
}

ClassicEditor.create( document.querySelector( '.textarea' ), {
					
					licenseKey: '',
					
					
					
				} )
				.then( editor => {
					window.editor = editor;
			
					
					
					
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: i6he89pbc63h-nohdljl880ze' );
					console.error( error );
				} );