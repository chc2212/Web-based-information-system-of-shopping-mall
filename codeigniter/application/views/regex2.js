/**
 * 
 */


function regex_check( type, word ){
	
	var num_check = /^[0-9]{1,}$/;
	var id_check = /^[a-z0-9_]{4,10}$/; 
	var name_check = /^[a-zA-Z_-]{2,20}$/; 
	
	switch ( type ) {
		case 'num':
			if( !num_check.test( word ))
				return false;
			break;
			
		case 'id':
			if( !id_check.test( word ))
				return false;
			break;
			
		case 'name':
			if( !name_check.test( word ))
				return false;
			break;
	
		default:
			break;
	}
	return true;
}