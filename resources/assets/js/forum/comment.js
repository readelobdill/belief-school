import $ from 'jquery';
import CommentForm from './comment-form';
import CommentStore from "stores/CommentStore";

export default class Comment {
    constructor(comment, forum) {
        this.comment = $(comment);
        this.replyForm = new CommentForm(this.comment.find('.reply-form').first(), this);
        this.forum = forum;
        this.setupEventListeners();
    }

    setupEventListeners() {
        this.comment.find('.reply').first().on('click', (e) => {
            e.preventDefault();
            this.reply();
        });
        this.replyForm.on('comment:new', (comment) => {
            this.addNewComment(comment)
        });
    }

    reply() {
        this.replyForm.toggle();
    }

    addNewComment(comment) {
        let $commentList = this.comment.children('.comments-list');
        console.log($commentList);
        if(!$commentList.length) {
            $commentList = $('<ul class="comments-list"></ul>')
            this.comment.append($commentList);
        }

        let $comment = $('<li class="comment">'+comment+'</li>');

        $commentList.append($comment);
        CommentStore.emit('comment:added', new Comment($comment, this.forum));

        this.replyForm.hide();
    }
}