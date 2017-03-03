/*
Navicat MySQL Data Transfer

Source Server         : cowell
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : new

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-03 14:46:57
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `new_count` int(11) DEFAULT NULL,
  `name_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `decription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_public` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO categories VALUES ('31', 'Thể Thao', '0', '2', 'The-Thao', 'The-Thao', '<p>#</p>', '0', '2017-02-27 03:09:59', null);
INSERT INTO categories VALUES ('32', 'Thể thao trong nước', '31', '0', 'The-thao-trong-nuoc', 'The-thao-trong-nuoc', '<p>#</p>', '0', '2017-02-27 03:10:12', null);
INSERT INTO categories VALUES ('33', 'Thể thao nước ngoài', '31', '0', 'The-thao-nuoc-ngoai', 'The-thao-nuoc-ngoai', '<p>#</p>', '0', '2017-02-27 03:10:24', null);
INSERT INTO categories VALUES ('34', 'Kinh Tế', '0', '0', 'Kinh-Te', 'Kinh-Te', '<p>#</p>', '1', '2017-03-02 01:28:16', null);
INSERT INTO categories VALUES ('42', 'Xã Hội', '0', '0', 'Xa-Hoi', 'Xa-Hoi', '<p>#</p>', '0', '2017-03-02 11:35:39', null);
INSERT INTO categories VALUES ('43', 'Giải trí', '0', '0', 'Giai-tri', 'Giai-tri', '<p>#</p>', '1', '2017-03-02 11:35:57', null);

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'trich dan',
  `content` text COLLATE utf8_unicode_ci COMMENT 'noi dung bao gom ca hinh anh',
  `user_id` int(11) DEFAULT NULL COMMENT 'nguoi  tao ra ban tin',
  `censor_id` int(11) DEFAULT NULL COMMENT 'nguoi duyet tin',
  `view` int(15) DEFAULT NULL COMMENT 'so luot xem',
  `time_public` datetime DEFAULT NULL COMMENT 'thoi gian dang tin',
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'luu cac ky tu cat de de tim kiem',
  `comment_id` int(11) DEFAULT NULL COMMENT 'id nguoi comment',
  `is_public` tinyint(4) DEFAULT NULL COMMENT 'co dang bai nay len khong',
  `is_hot` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feedback` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tra lai bai viet',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`cate_id`),
  CONSTRAINT `catid` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO news VALUES ('37', '31', 'Sir Alex Ferguson hé lộ điều tiếc nuối nhất về Mourinho', '<p>(D&acirc;n tr&iacute;) - Cựu HLV Sir Alex Ferguson đ&atilde; tỏ ra v&ocirc; c&ugrave;ng tiếc nuối v&igrave; kh&ocirc;ng chọn HLV Mourinho l&agrave; người kế nhiệm m&igrave;nh sau khi nghỉ hưu v&agrave;o năm 2013.</p>', '<p>Chỉ sau 7 th&aacute;ng dẫn dắt MU, HLV Mourinho đ&atilde; mang về cho MU hai danh hiệu (si&ecirc;u c&uacute;p Anh v&agrave; League Cup). Điều quan trọng, đội b&oacute;ng đang ph&aacute;t triển theo chiều hướng đi l&ecirc;n. Nhờ đ&oacute;, những người MU đang đặt trọn niềm tin v&agrave;o khả năng &ldquo;Người đặc biệt&rdquo; sẽ mang tới th&agrave;nh c&ocirc;ng cho CLB.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"VCSortableInPreviewMode IMSCurrentEditorEditObject\">\r\n<div><img id=\"img_340939\" src=\"https://dantricdn.com/866ee90709/2017/03/02/sir-alex-mourinhi-1488429750598.jpg\" alt=\"Sir Alex Ferguson nuối tiếc v&igrave; kh&ocirc;ng chọn Mourinho kế vị m&igrave;nh ở MU\" data-original=\"https://dantricdn.com/866ee90709/2017/03/02/sir-alex-mourinhi-1488429750598.jpg\" /></div>\r\n<div class=\"PhotoCMS_Caption\">Sir Alex Ferguson nuối tiếc v&igrave; kh&ocirc;ng chọn Mourinho kế vị m&igrave;nh ở MU</div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>Bản th&acirc;n Sir Alex Ferguson cũng rất vui mừng với th&agrave;nh c&ocirc;ng của CLB. M&ugrave;a n&agrave;y, &ocirc;ng đ&atilde; rất nhiều lần ăn mừng &ldquo;mất kiểm so&aacute;t&rdquo; tr&ecirc;n kh&aacute;n đ&agrave;i Old Trafford khi chứng kiến th&agrave;nh c&ocirc;ng của CLB (mới nhất l&agrave; sau khi Ibrahimovic ghi b&agrave;n ở League Cup).</p>\r\n<p>Ch&iacute;nh v&igrave; vậy, &ldquo;&ocirc;ng gi&agrave; g&acirc;n&rdquo; rất h&agrave;i l&ograve;ng với HLV Mourinho. B&ecirc;n cạnh đ&oacute;, &ocirc;ng cũng tỏ ra v&ocirc; c&ugrave;ng nuối tiếc v&igrave; đ&atilde; kh&ocirc;ng chọn &ldquo;Người đặc biệt&rdquo; l&agrave; người kế nhiệm m&igrave;nh sau khi nghỉ hưu v&agrave;o năm 2013. Theo tờ Daily Mail, cựu HLV người Scotland đ&atilde; t&acirc;m sự với một v&agrave;i người bạn về điều n&agrave;y. &Ocirc;ng cũng cho rằng đ&oacute; l&agrave; sai lầm lớn nhất của m&igrave;nh khi nghỉ hưu.</p>\r\n<p>Bản th&acirc;n Sir Alex Ferguson kh&ocirc;ng lường trước được việc CLB sẽ tụt dốc th&ecirc; thảm sau khi m&igrave;nh nghỉ hưu. Đơn giản bởi lực lượng trong tay &ocirc;ng vẫn &ldquo;chạy tốt&rdquo;, khi vừa gi&agrave;nh chức v&ocirc; địch Premier League m&ugrave;a giải 2012/13.</p>\r\n<p>Khi ấy, &ldquo;&ocirc;ng gi&agrave; g&acirc;n&rdquo; đ&atilde; chọn người đồng hương David Moyes để tiếp quản &ldquo;ghế n&oacute;ng&rdquo;. Tuy nhi&ecirc;n, thực tế cho thấy, David Moyes chưa đủ tầm để dẫn dắt CLB lớn như MU. Tiếp đ&oacute;, Van Gaal đ&atilde; tới nhưng cũng kh&ocirc;ng gi&agrave;nh được th&agrave;nh c&ocirc;ng.</p>\r\n<p>Sau th&agrave;nh c&ocirc;ng của Mourinho thời gian qua, BLĐ MU dự định sẽ &ldquo;tr&oacute;i ch&acirc;n&rdquo; &ocirc;ng theo bản hợp đồng c&oacute; thời hạn d&agrave;i hơn. Dự kiến, hợp đồng n&agrave;y sẽ được k&yacute; kết sau khi m&ugrave;a giải n&agrave;y kết th&uacute;c.</p>', null, null, null, null, ' Mourinho', null, '0', '0,2', null, '/uploads/thethao.jpg', '2017-03-03 12:25:10', '2017-03-03 02:45:50');
INSERT INTO news VALUES ('38', '31', 'Cầu thủ Long An nhận án phạt, còn trọng tài vô can?', '', '<p>Chỉ sau 7 th&aacute;ng dẫn dắt MU, HLV Mourinho đ&atilde; mang về cho MU hai danh hiệu (si&ecirc;u c&uacute;p Anh v&agrave; League Cup). Điều quan trọng, đội b&oacute;ng đang ph&aacute;t triển theo chiều hướng đi l&ecirc;n. Nhờ đ&oacute;, những người MU đang đặt trọn niềm tin v&agrave;o khả năng &ldquo;Người đặc biệt&rdquo; sẽ mang tới th&agrave;nh c&ocirc;ng cho CLB.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"VCSortableInPreviewMode IMSCurrentEditorEditObject\">\r\n<div><img id=\"img_340939\" src=\"https://dantricdn.com/866ee90709/2017/03/02/sir-alex-mourinhi-1488429750598.jpg\" alt=\"Sir Alex Ferguson nuối tiếc v&igrave; kh&ocirc;ng chọn Mourinho kế vị m&igrave;nh ở MU\" data-original=\"https://dantricdn.com/866ee90709/2017/03/02/sir-alex-mourinhi-1488429750598.jpg\" /></div>\r\n<div class=\"PhotoCMS_Caption\">Sir Alex Ferguson nuối tiếc v&igrave; kh&ocirc;ng chọn Mourinho kế vị m&igrave;nh ở MU</div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>Bản th&acirc;n Sir Alex Ferguson cũng rất vui mừng với th&agrave;nh c&ocirc;ng của CLB. M&ugrave;a n&agrave;y, &ocirc;ng đ&atilde; rất nhiều lần ăn mừng &ldquo;mất kiểm so&aacute;t&rdquo; tr&ecirc;n kh&aacute;n đ&agrave;i Old Trafford khi chứng kiến th&agrave;nh c&ocirc;ng của CLB (mới nhất l&agrave; sau khi Ibrahimovic ghi b&agrave;n ở League Cup).</p>\r\n<p>Ch&iacute;nh v&igrave; vậy, &ldquo;&ocirc;ng gi&agrave; g&acirc;n&rdquo; rất h&agrave;i l&ograve;ng với HLV Mourinho. B&ecirc;n cạnh đ&oacute;, &ocirc;ng cũng tỏ ra v&ocirc; c&ugrave;ng nuối tiếc v&igrave; đ&atilde; kh&ocirc;ng chọn &ldquo;Người đặc biệt&rdquo; l&agrave; người kế nhiệm m&igrave;nh sau khi nghỉ hưu v&agrave;o năm 2013. Theo tờ Daily Mail, cựu HLV người Scotland đ&atilde; t&acirc;m sự với một v&agrave;i người bạn về điều n&agrave;y. &Ocirc;ng cũng cho rằng đ&oacute; l&agrave; sai lầm lớn nhất của m&igrave;nh khi nghỉ hưu.</p>\r\n<p>Bản th&acirc;n Sir Alex Ferguson kh&ocirc;ng lường trước được việc CLB sẽ tụt dốc th&ecirc; thảm sau khi m&igrave;nh nghỉ hưu. Đơn giản bởi lực lượng trong tay &ocirc;ng vẫn &ldquo;chạy tốt&rdquo;, khi vừa gi&agrave;nh chức v&ocirc; địch Premier League m&ugrave;a giải 2012/13.</p>\r\n<p>Khi ấy, &ldquo;&ocirc;ng gi&agrave; g&acirc;n&rdquo; đ&atilde; chọn người đồng hương David Moyes để tiếp quản &ldquo;ghế n&oacute;ng&rdquo;. Tuy nhi&ecirc;n, thực tế cho thấy, David Moyes chưa đủ tầm để dẫn dắt CLB lớn như MU. Tiếp đ&oacute;, Van Gaal đ&atilde; tới nhưng cũng kh&ocirc;ng gi&agrave;nh được th&agrave;nh c&ocirc;ng.</p>\r\n<p>Sau th&agrave;nh c&ocirc;ng của Mourinho thời gian qua, BLĐ MU dự định sẽ &ldquo;tr&oacute;i ch&acirc;n&rdquo; &ocirc;ng theo bản hợp đồng c&oacute; thời hạn d&agrave;i hơn. Dự kiến, hợp đồng n&agrave;y sẽ được k&yacute; kết sau khi m&ugrave;a giải n&agrave;y kết th&uacute;c.</p>', null, null, null, null, 'Cầu thủ Long An', null, '0', '0,1', null, '/uploads/tintuc.jpg', '2017-03-03 02:08:17', null);
