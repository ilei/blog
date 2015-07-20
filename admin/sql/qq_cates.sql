-- MySQL dump 10.13  Distrib 5.6.19, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: admin
-- ------------------------------------------------------
-- Server version	5.6.19-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `qq_cates`
--

DROP TABLE IF EXISTS `qq_cates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qq_cates` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) DEFAULT '' COMMENT '类别名称',
  `cate_mark` varchar(100) DEFAULT '' COMMENT '类别标识',
  `created_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `updated_time` int(11) DEFAULT '0' COMMENT '更新时间',
  `status` int(2) DEFAULT '1' COMMENT '0删除，1未删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=196 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qq_cates`
--

LOCK TABLES `qq_cates` WRITE;
/*!40000 ALTER TABLE `qq_cates` DISABLE KEYS */;
INSERT INTO `qq_cates` VALUES (79,'情侣个性签名','qinglv',1435453825,1435453825,1),(80,'伤感个性签名','shanggan',1435453825,1435453825,1),(81,'超拽个性签名','chaozhuai',1435453825,1435453825,1),(82,'经典个性签名','jingdian',1435453825,1435453825,1),(83,'励志个性签名','lizhi',1435453825,1435453825,1),(84,'心情个性签名','xinqing',1435453825,1435453825,1),(85,'艺术个性签名','yishu',1435453825,1435453825,1),(86,'搞笑个性签名','gaoxiao',1435453825,1435453825,1),(87,'爱情个性签名','aiqing',1435453825,1435453825,1),(88,'繁体字个性签名','fantizi',1435453825,1435453825,1),(89,'哲理个性签名','zheli',1435453825,1435453825,1),(90,'幸福个性签名','xingfu',1435453825,1435453825,1),(91,'姐妹个性签名','jiemei',1435453825,1435453825,1),(92,'兄弟个性签名','xiongdi',1435453825,1435453825,1),(93,'英文个性签名','yingwen',1435453825,1435453825,1),(94,'悲伤个性签名','beishang',1435453825,1435453825,1),(95,'霸气个性签名','baqi',1435453825,1435453825,1),(96,'男生个性签名','nansheng',1435453825,1435453825,1),(97,'女生个性签名','nvsheng',1435453825,1435453825,1),(98,'非主流个性签名','feizhuliu',1435453825,1435453825,1),(99,'伤心个性签名','shangxin',1435453825,1435453825,1),(100,'分手个性签名','fenshou',1435453825,1435453825,1),(101,'人生格言个性签名','renshenggeyan',1435453825,1435453825,1),(102,'唯美个性签名','weimei',1435453825,1435453825,1),(103,'暗恋个性签名','anlian',1435453825,1435453825,1),(104,'无奈个性签名','wunai',1435453825,1435453825,1),(105,'火星文个性签名','huoxingwen',1435453825,1435453825,1),(106,'明星个性签名','mingxing',1435453825,1435453825,1),(107,'心累个性签名','xinlei',1435453825,1435453825,1),(108,'生日个性签名','shengri',1435453825,1435453825,1),(109,'烦躁个性签名','fanzao',1435453825,1435453825,1),(110,'失望个性签名','shiwang',1435453825,1435453825,1),(111,'无聊个性签名','wuliao',1435453825,1435453825,1),(112,'思念个性签名','sinian',1435453825,1435453825,1),(113,'心痛个性签名','xintong',1435453825,1435453825,1),(114,'生气个性签名','shengqi',1435453825,1435453825,1),(115,'开心个性签名','kaixin',1435453825,1435453825,1),(116,'空间个性签名','kongjian',1435453825,1435453825,1),(117,'成熟个性签名','chengshu',1435453825,1435453825,1);
/*!40000 ALTER TABLE `qq_cates` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-28 17:19:08
