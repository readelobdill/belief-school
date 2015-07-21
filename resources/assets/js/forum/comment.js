import $ from 'jquery';
import CommentForm from './comment-form';
import CommentStore from "stores/CommentStore";

export default class Comment {
    constructor(comment, forum) {
        this.comment = $(comment);
        this.replyForm = new CommentForm(this.comment.find('.reply-form').first(), this);
        this.forum = forum;
        this.setupEventListeners();
        console.log(this.comment);
    }

    setupEventListeners() {
        this.comment.on('click', '.reply', (e) => {
            e.preventDefault();
            this.reply();
        });
        this.replyForm.on('comment:new', (comment) => {
            this.addNewComment(comment)
        });
    }

    reply() {
        this.replyForm.show();
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


    }
}