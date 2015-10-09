import $ from 'jquery';

export function ImageCrop(img, target){

    var w = img.width,
        h = img.height,
        minWidth = 60,
        tw,th,selectorRatio,tRatio,ratio,
        cw,ch,cx,cy,sw,sh,sx,sy, currentData,
        canDrag = false,
        canResize = false,
        start = {x:0,y:0};

    var $container = $('<div class="crop-container"><div class="crop-selector"><div class="crop-shade shade-top"></div><div class="crop-shade shade-bottom"></div><div class="crop-shade shade-left"></div><div class="crop-shade shade-right"></div><div class="crop-resize"></div></div></div>');
    let $cropSelector = $container.find('.crop-selector');
    let $cropResize = $container.find('.crop-resize');
    let $shadeTop = $container.find('.shade-top');
    let $shadeBottom = $container.find('.shade-bottom');
    let $shadeLeft = $container.find('.shade-left');
    let $shadeRight = $container.find('.shade-right');
    let $shades = $container.find('.crop-shade');


    var $img = $(img);

    function shade(w,h){
        $container.find('.crop-shade').css({
            position:'absolute',
            background:'rgba(0,0,0,0.5)'
        });
        $container.find('.shade-top').css({
            bottom:'100%',
            left:-tw+'px',
            width:(w+tw*2)+'px',
            height:th+'px'
        });
        $container.find('.shade-bottom').css({
            top:'100%',
            left:-tw+'px',
            width:(w+tw*2)+'px',
            height:th+'px'
        });
        $container.find('.shade-left').css({
            right:'100%',
            height:h+'px',
            width:tw+'px',
            top:0
        });
        $container.find('.shade-right').css({
            left:'100%',
            height:h+'px',
            width:tw+'px',
            top:0
        });
    }

    function resize(){
        tw = target.width();
        th = target.height();
        selectorRatio = 9/6;
        tRatio = tw/th;
        ratio = w/h;
        cw = tw;
        ch = th;
        cx = 0;
        cy = 0;

        if(tRatio > ratio){
            cw = th * ratio;
            cx = (tw - cw) / 2;
        }else{
            ch = tw / ratio;
            cy = (th - ch) / 2;
        }

        sw = Math.round(cw/3*2);
        sh = sw/selectorRatio;
        sx = (cw-sw)/2;
        sy = (ch-sh)/2;

        $container.css({
            width:cw+'px',
            height:ch+'px',
            left:cx+'px',
            top:cy+'px',
            position:'absolute',
            overflow:'hidden'
        })

        $container.find('.crop-selector').css({
            width:sw+'px',
            height:sh+'px',
            left:sx+'px',
            top:sy+'px',
            border:'1px solid blue',
            position:'absolute'
        })

        currentData = {x:sx, y:sy, w:sw, h:sh};
        shade(sw,sh);
    }

    resize();

    $img.css({
        width:'100%',
        height:'100%'
    });

    $cropResize.css({
        width:'40px',
        height:'40px',
        position:'absolute',
        bottom:'0',
        right:'0',
        background:'green'
    });

    target.append($container);
    $container.append($img);

    function dragSelect(x,y){
        start.x = x;
        start.y = y;
        canDrag = true;
    }

    function drag(x,y){
        var moveX = Math.max(0,Math.min(currentData.x + x-start.x, cw - currentData.w));
        var moveY = Math.max(0,Math.min(currentData.y +y-start.y, ch - currentData.h));

        $cropSelector.css({
            width:currentData.w+'px',
            height:currentData.h+'px',
            left:moveX+'px',
            top:moveY+'px',
            border:'1px solid blue',
            position:'absolute'
        })
    };

    function dragEnd(x,y){
        var moveX = x-start.x;
        var moveY = y-start.y;
        canDrag = false;
        currentData.x = Math.max(0,Math.min(currentData.x+moveX, cw - currentData.w));
        currentData.y = Math.max(0,Math.min(currentData.y+moveY, ch - currentData.h));
    }


    function resizeSelect(x,y){
        start.x = x;
        start.y = y;
        canResize = true;
    }

    function resizeDimensions(xmove, ymove){
        var w,h;

        if(ymove>xmove){
            h = currentData.h + ymove;
            w = h*selectorRatio;
        }else{
            w = currentData.w + xmove;
            h = w/selectorRatio;
        }

        if(w + currentData.x > cw){
            w =  cw - currentData.x;
            h = w/selectorRatio;
        }

        if(h + currentData.y > ch){
            h =  ch - currentData.y;
            w = h*selectorRatio;
        }

        if(w < minWidth){
            w = minWidth;
            h = w/selectorRatio;
        }
        return {w:w, h:h};
    }

    function resizeEnd(x,y){
        var xmove = x - start.x;
        var ymove = y - start.y;
        var dims = resizeDimensions(xmove, ymove);
        canResize = false;

        currentData.w = Math.max(dims.w,1);
        currentData.h = Math.max(dims.h,1);
    }


    function resizeDrag(x,y){
        var xmove = x - start.x;
        var ymove = y - start.y;
        var dims = resizeDimensions(xmove, ymove);

        $cropSelector.css({
            width:dims.w+'px',
            height:dims.h+'px'
        })

        shade(dims.w,dims.h);
    }

    this.getData = function(){
        var scale = w/cw;
        var obj = {};
        obj.w = currentData.w*scale;
        obj.h = currentData.h*scale;
        obj.x = currentData.x*scale;
        obj.y = currentData.y*scale;
        return obj;
    }


    $cropSelector.on('touchstart.cropper', function (e){
        var x = e.originalEvent.changedTouches[0].clientX, y = e.originalEvent.changedTouches[0].clientY;
        dragSelect(x,y);
    })

    $cropResize.on('touchstart.cropper', function (e){
        e.stopPropagation();
        var x = e.originalEvent.changedTouches[0].clientX, y = e.originalEvent.changedTouches[0].clientY;
        resizeSelect(x,y);
    })

    $(window).on('touchmove.cropper', function (e){
        if(!canDrag && !canResize) return;
        e.preventDefault();
        var x = e.originalEvent.changedTouches[0].clientX, y = e.originalEvent.changedTouches[0].clientY;
        if(canDrag) drag(x,y);
        else if(canResize) resizeDrag(x,y);
    })

    $(window).on('touchend.cropper', function (e){
        if(!canDrag && !canResize) return;
        e.preventDefault();
        var x = e.originalEvent.changedTouches[0].clientX, y = e.originalEvent.changedTouches[0].clientY;
        if(canDrag) dragEnd(x,y);
        else if(canResize) resizeEnd(x,y);
    })


    $cropSelector.on('mousedown.cropper', function (e){
        var x = e.clientX, y = e.clientY;
        dragSelect(x,y);
    })
    $cropResize.on('mousedown.cropper', function (e){
        e.stopPropagation();
        var x = e.clientX, y = e.clientY;
        resizeSelect(x,y);
    })

    $(window).on('mousemove.cropper', function (e){
        if(!canDrag && !canResize) return;
        e.preventDefault();
        var x = e.clientX, y = e.clientY;
        if(canDrag) drag(x,y);
        else if(canResize) resizeDrag(x,y);
    })

    $(window).on('mouseup.cropper', function (e){
        if(!canDrag && !canResize) return;
        e.preventDefault();
        var x = e.clientX, y = e.clientY;
        if(canDrag) dragEnd(x,y);
        else if(canResize) resizeEnd(x,y);
    })

    $(window).on('resize.cropper', resize);



    this.destroy = function() {
        $(window).off('.cropper');
        $cropResize.off('.cropper');
        $cropSelector.off('.cropper');
    }

}