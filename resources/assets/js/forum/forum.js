import CommentForm from './comment-form';
import Comment from './comment';
import animate from 'modules/animate';
import $ from 'jquery';
import Text from 'modules/module-sections/text';
import CommentStore from 'stores/CommentStore';

class Forum {
    constructor(forum) {
        this.forum = $(forum);
        this.forum.find('[data-arc]').each(function() {
            var arc = parseInt($(this).data('arc'));
            $(this).arctext({radius: arc});
        })
        this.comments = this.forum.find('.comment').map((index, comment) => {
            return new Comment(comment, this);
        }).get();
        this.commentForm = new CommentForm(this.forum.find('.comment-form'), this);
        this.show();

        this.setupEventListeners()

    }


    show() {
        this.setup();
        animate.to(this.forum.find('section.module-section'), 0, {autoAlpha: 1});
        animate.to(this.forum.find('section.module-section > .inner'), 0.7, {autoAlpha: 1});


    }

    setupEventListeners() {

        CommentStore.on('comment:added', (comment) => {
            this.comments.push(comment);
            this.updateHeight();
        })

        this.commentForm.on('comment:new', (comment) => {
            this.addNewComment(comment);
        });
    }

    setup() {
        this.updateHeight();
    }

    updateHeight() {
        let height = this.forum.find('.content').outerHeight();
        let padding = parseInt(this.forum.find('section').css('padding-top'));

        $('body').css({minHeight: height + (padding * 2)});
    }

    addNewComment(comment) {
        var $commentList = this.forum.find('.comments-list').first();
        let $comment = $('<li class="comment">'+comment+'</li>');
        let $sticky = $commentList.find('.sticky');
        if($sticky.length) {
            $sticky.last().after($comment);
        } else {
            $commentList.prepend($comment);
        }

        CommentStore.emit('comment:added', new Comment($comment, this));


    }
}

export default {
    init: () => {
        let forum = new Forum('[data-page=forum]');
    }
}