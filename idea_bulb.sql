-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg28.eigbox.net
-- Generation Time: Apr 17, 2013 at 02:54 PM
-- Server version: 5.0.91
-- PHP Version: 4.4.9
-- 
-- Database: `idea_bulb`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `attachments`
-- 

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL auto_increment,
  `contribution_id` int(11) NOT NULL,
  `filename` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `attachments`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `boards`
-- 

CREATE TABLE `boards` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- 
-- Dumping data for table `boards`
-- 

INSERT INTO `boards` VALUES (15, 'New Name For The PlanViewer', 'A list of possible names for the plan viewer.', '2013-04-09 22:39:58');
INSERT INTO `boards` VALUES (16, 'Test Board', 'A board used for debugging the app', '2013-04-09 22:47:56');
INSERT INTO `boards` VALUES (17, 'Time-Based Social Network', 'A social network that only allows posts to be on for certain periods of time.  This allows the users to see what is happening "right now".', '2013-04-09 23:02:28');
INSERT INTO `boards` VALUES (18, 'Extended PlanViewer Functionality', 'Possible features that could be add to the PlanViewer to enhance its functionality.', '2013-04-09 23:03:18');
INSERT INTO `boards` VALUES (19, ' Tech Investment Group', '  Discover up and coming technology and tech companies', '2013-04-09 23:03:35');
INSERT INTO `boards` VALUES (20, 'New Name For "White Board" (This App)', 'List of names for this app.  Not necessary but could use something more original.', '2013-04-09 23:07:42');
INSERT INTO `boards` VALUES (21, 'Extended Functionality For "White Board"', 'Add features to enhance the usage of this app.  Maybe to one day put it into commercial production.', '2013-04-09 23:08:54');
INSERT INTO `boards` VALUES (22, 'List Of Bugs For PlanViewer', 'Bugs found in the PlanViewer Android, iPhone, or Computer apps.  Make sure to specify the platform in the report.', '2013-04-09 23:09:54');
INSERT INTO `boards` VALUES (23, 'List Of Bugs For "White Board"', 'List of bugs found for this app.', '2013-04-09 23:10:36');
INSERT INTO `boards` VALUES (24, 'New Craigslist', 'A new version of craigslist.  The problem with the current one is its ugly and it has a ridiculous amount of spam.', '2013-04-09 23:22:51');
INSERT INTO `boards` VALUES (25, 'New TV idea', 'Make a tv sensor where you can clap to turn your tv on and off incase you lose the remote. Snap for channels and whistle for volume. ', '2013-04-10 22:59:01');
INSERT INTO `boards` VALUES (26, 'PlanViewer Plan of Action', 'How to go about implementing certain features', '2013-04-11 23:43:43');

-- --------------------------------------------------------

-- 
-- Table structure for table `contributions`
-- 

CREATE TABLE `contributions` (
  `id` int(11) NOT NULL auto_increment,
  `board_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `user_id` text NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

-- 
-- Dumping data for table `contributions`
-- 

INSERT INTO `contributions` VALUES (38, 18, 'Rather than pushing a button to update your files.  It should be automatic in the background when user opens app or periodically.  That way it eliminates the possibility of long periods of time without updating.', '1', '2013-04-09 23:04:27');
INSERT INTO `contributions` VALUES (37, 15, ' PlanSource', '1', '2013-04-09 22:57:40');
INSERT INTO `contributions` VALUES (39, 18, 'The API needs to be updated so that the server acts strictly as a data server rather than the crude API currently in place.  HTTP "verbs" need to be used with "nouns" to get and post data.', '1', '2013-04-09 23:05:48');
INSERT INTO `contributions` VALUES (40, 21, 'A voting system for contributions.  Allows the popular ones to "float" to the top.', '1', '2013-04-09 23:11:46');
INSERT INTO `contributions` VALUES (41, 18, ' Team up with an  online discount printing company to provide prints from plan viewer files. This could be a big income source. ', '1', '2013-04-09 23:12:31');
INSERT INTO `contributions` VALUES (42, 21, 'Create user logins.  Allows the boards and contributions to be associated with an individual.', '1', '2013-04-09 23:12:36');
INSERT INTO `contributions` VALUES (43, 21, 'On the "board" screen, there needs to be some way of knowing that new contributions have been made.  A board count of some kind.', '1', '2013-04-09 23:13:39');
INSERT INTO `contributions` VALUES (44, 21, 'Ability to edit contributions.  This one is iffy mostly because an idea should never be erased.  Maybe a comment system of some kind.  But something original.  Not a traditional comment system.', '1', '2013-04-09 23:14:49');
INSERT INTO `contributions` VALUES (45, 17, 'Users can post videos, pictures, statuses.  But they only stay on for say an hour.  This allows continuously new content. ', '1', '2013-04-09 23:17:06');
INSERT INTO `contributions` VALUES (46, 17, 'By making the content only last a certain amount of time, it eliminates the potential of your professional life intermixing with your social life.  Past post can no longer be seen.', '1', '2013-04-09 23:18:25');
INSERT INTO `contributions` VALUES (47, 17, 'Could be solely a specific media.  Ex) Pictures', '1', '2013-04-09 23:19:25');
INSERT INTO `contributions` VALUES (48, 20, 'Idea Bulb', '1', '2013-04-09 23:19:47');
INSERT INTO `contributions` VALUES (49, 21, 'A social aspect of sharing ideas and sharing "boards" with friends so they can contribute ideas.  The whole point of the app is the ability to collaborate with other people on ideas easily.', '1', '2013-04-09 23:24:55');
INSERT INTO `contributions` VALUES (50, 21, 'Ability to archive.  This ability gives you the opportunity to remove the board so it can no longer get contributions but it will be archived to your account so nothing is ever deleted.  No idea should ever be deleted.', '1', '2013-04-09 23:26:57');
INSERT INTO `contributions` VALUES (51, 21, 'The mobile website needs to be looked at.  Once an android/iPhone app is created a page can redirect them to the appropriate appStore page.', '1', '2013-04-09 23:29:53');
INSERT INTO `contributions` VALUES (52, 21, 'A check off system for ideas that have been implemented or ones that should be implemented.', '1', '2013-04-09 23:30:53');
INSERT INTO `contributions` VALUES (53, 21, 'Loading screens or icons so the user is sure whats going on', '1', '2013-04-09 23:31:06');
INSERT INTO `contributions` VALUES (54, 16, 'Test notification', '1', '2013-04-10 22:47:56');
INSERT INTO `contributions` VALUES (55, 26, 'For loading files, use the same implementation for white board of hidden iframe and then append a number for the file from the temp dir.  Could upload file on submit and then wait for it to upload by polling the server.  Could do it in two steps and add a file after page is created "update" the file even though there isn''t one to begin with.', '1', '2013-04-11 23:49:34');
INSERT INTO `contributions` VALUES (56, 26, 'How to deal with the page moving.  Could keep it at its current method.  Not for production however.  Maybe go into a "state" of rearranging.  Then update at very end. Edit the number directly then update the file accordingly', '1', '2013-04-11 23:51:07');
INSERT INTO `contributions` VALUES (57, 26, ' Share jobs with user not the other way around. Go to a screen with check boxes for all jobs and decide which jobs to share. Could do it in the notification area. ', '1', '2013-04-12 00:09:14');
INSERT INTO `contributions` VALUES (58, 24, 'Prevent spam by using a captcha.', '1', '2013-04-12 14:47:45');
INSERT INTO `contributions` VALUES (59, 24, 'Use lat and long to specify a radius of area for stuff near you rather than have specific towns.', '1', '2013-04-12 14:48:32');
INSERT INTO `contributions` VALUES (60, 24, 'Give it a tile layout with each item primarily consisting of pictures if they have one. Similar to pentrest layout.', '1', '2013-04-12 14:49:18');
INSERT INTO `contributions` VALUES (61, 21, 'Make board page look like one big board with different tiles on it for contributions.', '1', '2013-04-12 14:50:03');
INSERT INTO `contributions` VALUES (62, 24, 'Not necessarily mobile based.  Primarily computer application.  Don''t use backbone.  Create a multipage website for seo.', '1', '2013-04-12 14:51:05');
INSERT INTO `contributions` VALUES (63, 24, 'Every x amount of days repost each ad that hasn''t sold to top.  Prevents spam by not having mulitple of the same one. Remove posts after 30 days however.', '1', '2013-04-12 14:52:00');
INSERT INTO `contributions` VALUES (64, 24, 'Give suggestions of things they might buy.  Probably not.', '1', '2013-04-12 14:52:48');
INSERT INTO `contributions` VALUES (65, 24, 'Stay out of the money transaction!  ', '1', '2013-04-12 14:53:10');
INSERT INTO `contributions` VALUES (66, 24, 'No need to email seller.  Instead the buyer send him a message and the seller gets an email.  For phone numbers, could create alias phone numbers or make a captcha to get phone number.  Or some kind of "check if you''re human" thing.  ', '1', '2013-04-12 14:55:22');

-- --------------------------------------------------------

-- 
-- Table structure for table `notifications`
-- 

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL auto_increment,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `board_id` int(11) NOT NULL,
  `contribution_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- 
-- Dumping data for table `notifications`
-- 

INSERT INTO `notifications` VALUES (12, '2013-04-10 22:47:56', 16, 54);
INSERT INTO `notifications` VALUES (13, '2013-04-11 23:49:34', 26, 55);
INSERT INTO `notifications` VALUES (14, '2013-04-11 23:51:07', 26, 56);
INSERT INTO `notifications` VALUES (15, '2013-04-12 00:09:14', 26, 57);
INSERT INTO `notifications` VALUES (16, '2013-04-12 14:47:45', 24, 58);
INSERT INTO `notifications` VALUES (17, '2013-04-12 14:48:32', 24, 59);
INSERT INTO `notifications` VALUES (18, '2013-04-12 14:49:18', 24, 60);
INSERT INTO `notifications` VALUES (19, '2013-04-12 14:50:03', 21, 61);
INSERT INTO `notifications` VALUES (20, '2013-04-12 14:51:05', 24, 62);
INSERT INTO `notifications` VALUES (21, '2013-04-12 14:52:00', 24, 63);
INSERT INTO `notifications` VALUES (22, '2013-04-12 14:52:48', 24, 64);
INSERT INTO `notifications` VALUES (23, '2013-04-12 14:53:10', 24, 65);
INSERT INTO `notifications` VALUES (24, '2013-04-12 14:55:22', 24, 66);

-- --------------------------------------------------------

-- 
-- Table structure for table `temp_files`
-- 

CREATE TABLE `temp_files` (
  `id` int(11) NOT NULL auto_increment,
  `filename` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

-- 
-- Dumping data for table `temp_files`
-- 

INSERT INTO `temp_files` VALUES (44, 'idea_bulb.sql');
INSERT INTO `temp_files` VALUES (45, '');
