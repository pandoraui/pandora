
/*
 * placeholder 功能扩展
 *
**/

window.onload = function(){
    var doc = document,
    inputs = doc.getElementsByTagName('input'),
    supportPlaceholder = 'placeholder' in doc.createElement('input'),
    placeholder = function(input){
        var text = input.getAttribute('placeholder'),
            defaultValue = input.defaultValue;
        if(input.value=="" || input.value==text){
            input.value=text;
            input.style.color = 'gray';
        }
        
        input.onfocus = function(){
            if(input.value === text){
                this.value = '';
                this.style.color = '';
            }
        }
        input.onblur = function(){
            if(input.value === ''){
                input.style.color = 'gray';
                this.value = text;
            }
        }
        input.onkeydown = function(){
            this.style.color = '';
        }
    };
    if(!supportPlaceholder){
        for(var i = 0, len = inputs.length; i < len; i++){
            var input = inputs[i], text = input.getAttribute('placeholder');
            if(input.type === 'text' && text){
                placeholder(input);
            }
        }    
    }
}
