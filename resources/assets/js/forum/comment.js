import $ from 'jquery';
import CommentForm from './comment-form';
import CommentStore from "stores/CommentStore";
import client from "sources/CommentClient";

export default class Comment {
    constructor(comment, forum) {
        this.comment = $(comment);
        this.replyForm = new CommentForm(this.comment.find('.reply-form').first(), this);
        this.forum = forum;
        this.setupEventListeners();
    }

    setupEventListeners() {
        if(!this.comment.find('>.inner').hasClass('is-deleted')) {
            this.comment.find('.reply').first().on('click', (e) => {
                e.preventDefault();
                this.reply();
            });    
        }
        
        this.comment.find('.delete-comment').first().on('click', (e) => {
            e.preventDefault();
            this.deleteComment($(e.currentTarget).attr('href'));
        });
        this.comment.find('.sticky-comment').first().on('click', (e) => {
            e.preventDefault();
            this.stickyComment($(e.currentTarget).attr('href'));
        });
        this.replyForm.on('comment:new', (comment) => {
            this.addNewComment(comment)
        });
        this.replyForm.on('comment:sending', () => {
            this.replyForm.hide();
            this.comment.addClass('comment-is-loading');
        })
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
        this.comment.removeClass('comment-is-loading');


    }

    deleteComment(url) {
        client.deleteComment(url).then(response => response.text())
            .then(comment => {
                window.location = window.location;
            });
    }

    stickyComment(url) {
        client.stickyComment(url).then(response => response.text())
            .then(comment => {
                window.location = window.location;
            });
    }
}