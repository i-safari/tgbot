<?php

namespace Devcom\Payamgir\Core\bot;

enum UpdateMessageType: string
{
    case Text = "text";
    case Animation = "animation";
    case Audio = "audio";
    case Document = "document";
    case Photo = "photo";
    case Sticker = "sticker";
    case Video = "video";
    case Video_note = "video_note";
    case Voice = "voice";
    case Contact = "contact";
    case Dice = "dice";
    case Game = "game";
    case Poll = "poll";
    case Venue = "venue";
    case Location = "location";
    case NewChatMembers = "new_chat_members";
    case LeftChatMember = "left_chat_member";
    case NewChatTitle = "new_chat_title";
    case NewChatPhoto = "new_chat_photo";
    case DeleteChatPhoto = "delete_chat_photo";
    case group_chat_created = "group_chat_created";
    case supergroup_chat_created = "supergroup_chat_created";
    case channel_chat_created = "channel_chat_created";
    case message_auto_delete_timer_changed = "message_auto_delete_timer_changed";
    case migrate_to_chat_id = "migrate_to_chat_id";
    case migrate_from_chat_id = "migrate_from_chat_id";
    case pinned_message = "pinned_message";
    case invoice = "invoice";
    case successful_payment = "successful_payment";
    case user_shared = "user_shared";
    case chat_shared = "chat_shared";
    case write_access_allowed = "write_access_allowed";
    case passport_data = "passport_data";
    case proximity_alert_triggered = "proximity_alert_triggered";
    case forum_topic_created = "forum_topic_created";
    case forum_topic_edited = "forum_topic_edited";
    case forum_topic_closed = "forum_topic_closed";
    case forum_topic_reopened = "forum_topic_reopened";
    case general_forum_topic_hidden = "general_forum_topic_hidden";
    case general_forum_topic_unhidden = "general_forum_topic_unhidden";
    case video_chat_scheduled = "video_chat_scheduled";
    case video_chat_started = "video_chat_started";
    case video_chat_ended = "video_chat_ended";
    case video_chat_participants_invited = "video_chat_participants_invited";
    case web_app_data = "web_app_data";
    case reply_markup = "reply_markup";
}