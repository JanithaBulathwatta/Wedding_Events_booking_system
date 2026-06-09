function init(){

}
function validations(){

}
function events(){
    $('.counter-value').each(function() {
        let $this = $(this);
        let countTo = parseInt($this.attr('data-target'));

        if (countTo === 0) {
            $this.text(0);
            return;
        }

        $({ countNum: 0 }).animate({
            countNum: countTo
        },
        {
            duration: 500,
            easing: 'swing',
            step: function() {
                $this.text(Math.floor(this.countNum));
            },
            complete: function() {
                $this.text(this.countNum);
            }
        });
    });
}
