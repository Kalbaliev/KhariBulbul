/**
 * Created by Kalbaliev on 25.03.2018.
 */
if ((screen.height>319 && screen.height<767)&&(screen.width>319 && screen.width<767)) {
    $("#titleBack").attr("src","/assets/images/formobback.jpg");
    $("#reception-img").attr("src","/assets/images/reception_mob.jpg");
    $(".left-sidebar div").removeClass("scroll-sidebar");

}
else if (screen.height==812 && screen.width==375){
    $("#titleBack").attr("src","/assets/images/formobback.jpg");

}
else {
    $("#reception-img").attr("src","/assets/images/reception.jpg");
    $("#titleBack").attr("src","/assets/images/5555.jpg");



}