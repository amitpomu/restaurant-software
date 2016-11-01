// data table
    $(function(){
        $("table").stupidtable();
    });

//date picker 

	$('.datepicker').datepicker({
    	startDate: '-50y'
	});	

// accordion

	  $(document).ready(function() {
	  	$('#products').click(function(){
	  		$('#product-list').slideToggle(400);
	  	});
		  	$('#stocks,#reports,#salaries').click(function(){
		  		$('#product-list').slideUp(400);
		  	});

	  	$('#stocks').click(function(){
	  		$('#stock-list').slideToggle(400);
	  	});
		  	$('#products,#reports,#salaries').click(function(){
		  		$('#stock-list').slideUp(400);
		  	});


	  	$('#reports').click(function(){
	  		$('#report-list').slideToggle(400);
	  	});
	  		$('#products,#stocks,#salaries').click(function(){
		  		$('#report-list').slideUp(400);
		  	});


	  	$('#salaries').click(function(){
	  		$('#salary-list').slideToggle(400);
	  	});
	  		$('#products,#reports,#stocks').click(function(){
		  		$('#salary-list').slideUp(400);
		  	}); 
		  		
	  });

// choosen select
var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }



// Zopim Live Chat Script
// window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
// d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
// _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
// $.src="//v2.zopim.com/?3HTsavFnWw0GRhUySQarNoPHSxnJ6kya";z.t=+new Date;$.
// type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
