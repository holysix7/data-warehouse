(function($){
	/* ===============
	// $(Elem).formatNumber({opts});
	// =============== */
    $.fn.extend({
			formatNumber: function(options){
				var defaults = {
				cents: '.',
				decimal: ','
			}
            
			var o =  $.extend(defaults, options);

			return this.each(function() {
			/* ----Script Start---- */
				var thiz = $(this), values, x, x1, x2;
				//try{
				values = $.trim(thiz.html());
				//console.log(values);
				values += '';
				x = values.split(o.cents);
				//console.log(x);
				x1 = x[0];
				//console.log(x1);
				x2 = x.length > 1 ? o.cents + x[1] : '';
				//console.log(x2);
				var rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + o.decimal + '$2');
			}
			thiz.html(x1 + x2);
			//}catch(e){
			//	thiz.html('Value ('+values+') not formatable.');
			//}
			
			/* ----Script End---- */
			});//return each
		}//fn.extend
	});
})(jQuery);