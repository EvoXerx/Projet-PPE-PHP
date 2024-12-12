DROP TABLE IF EXISTS video;

create table video
(
    id      int auto_increment,
    name    text        null,
    videoId varchar(30) null,
    PRIMARY KEY (id)
);