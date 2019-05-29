$('.navbar-nav').find('a').each(function() {
    if (this.href == document.location.href || document.location.href.search(this.href) >= 0) {
        $(this).parent().addClass('active'); // this.className = 'active';
    } else {
        $(this).parent().removeClass('active');
    }
});
/*
var list = document.querySelectorAll('.list');
function accordion(e) {
        for (i = 0; i < list.length; i++) {
                list[i].classList.remove('active');
            }
            //点开的另一个list也要标记为active
            this.classList.add('active');
        }
    //阻止点击事件向下传播
    //e.stopPropagation();
    //如果本节点已激活（active），则移除active

//每个list节点的click点击事件绑定accordion判断事件*/