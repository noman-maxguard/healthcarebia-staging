$(function(){


        // IV Infusion Therapy
        $(document).ready(function(){
            $('.infusion-carosel.owl-carousel').owlCarousel({
                items:1,
                loop:true,
                margin:0,
                autoplay:true,
                nav:false,
                dots:false,
                responsive:{
                    0:{
                        items:2
                    },
                    600:{
                        items:2
                    },
                    767:{
                        items:3
                    },
                    991:{
                        items:4
                    },
                    1200:{
                        items:5
                    }
                }
            });
        });


        // IV Infusion Therapy
        $(document).ready(function(){
            $('.iv-therapy-caroosel.owl-carousel').owlCarousel({
                items:1,
                loop:true,
                margin:0,
                autoplay:true,
                nav:false,
                dots:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2,
                        margin:20
                    },
                    767:{
                        items:3,
                        margin:20
                    },
                    991:{
                        items:2,
                        margin:20
                    },
                    1200:{
                        items:2
                    }
                }
            });
        });


        // Testimonial
        $(document).ready(function(){
            $('.testimonial-caroosel.owl-carousel').owlCarousel({
                items:1,
                loop:false,
                margin:25,
                autoplay:false,
                nav:false,
                dots:false,
                responsive:{
                    0:{
                        items:1
                    },
                    767:{
                        items:2
                    },
                    991:{
                        items:3
                    }
                }
            });
        });

        // Gallery
        $(document).ready(function(){
            $('.gallery-caroosel.owl-carousel').owlCarousel({
                items:1,
                loop:true,
                margin:10,
                autoplay:true,
                nav:false,
                dots:false,
                responsive:{
                    0:{
                        items:2
                    },
                    991:{
                        items:3
                    },
                    1200:{
                        items:4
                    }
                    ,
                    1400:{
                        items:4
                    }
                }
            });
        });
 
});


