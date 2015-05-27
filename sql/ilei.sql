-- MySQL dump 10.13  Distrib 5.6.17, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ilei
-- ------------------------------------------------------
-- Server version   5.6.17-0ubuntu0.14.04.1

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
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `cate_id` int(16) NOT NULL DEFAULT '0',
  `menu_id` int(10) DEFAULT '0',
  `created_time` int(11) DEFAULT NULL,
  `updated_time` int(11) DEFAULT NULL,
  `status` int(10) DEFAULT '1',
  `content` text,
  `reads` int(10) DEFAULT '0',
  `comments` int(10) DEFAULT '0',
  `url` varchar(500) DEFAULT '',
  `cate_name` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (3,'PHP引用(&)解析','王雷鸣',5,0,1421484493,1421643250,1,'<p>&nbsp;&nbsp;&nbsp;&nbsp;最近一直在学习C,C指针学习很.......,学习的时候想到了PHP里面的引用,所以就简单分析了下他们的区别,顺便也加深了多php的了解,这篇仅介绍php的引用</p><p>&nbsp;&nbsp;&nbsp;&nbsp;PHP引用:就是给变量内容取别名.<br/></p><p>&nbsp; &nbsp; C指针:存储的是变量的内容在内存中的地址.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;不明白没事啊,看代码.<br/></p><p>&nbsp; &nbsp; 变量的引用:</p><pre class=\"brush:php;toolbar:false\">&nbsp;&nbsp;&nbsp;&nbsp;&lt;?php&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$a&nbsp;=&nbsp;10;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/*\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;$a和$b在这里是完全相同的,这并不是$a指向了$b或者相反,而是$a和$b指向了同一个地方\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$b&nbsp;=&nbsp;&amp;$a;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$a&nbsp;.&nbsp;&#39;--&#39;&nbsp;.&nbsp;$b&nbsp;.&nbsp;&#39;&lt;br/&gt;&#39;;//10--10\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$a&nbsp;=&nbsp;20;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$a&nbsp;.&nbsp;&#39;--&#39;&nbsp;.&nbsp;$b&nbsp;.&nbsp;&#39;&lt;br/&gt;&#39;;//20--20\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$b&nbsp;=&nbsp;30;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$a&nbsp;.&nbsp;&#39;--&#39;&nbsp;.&nbsp;$b&nbsp;.&nbsp;&#39;&lt;br/&gt;&#39;;//30-30\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;如果具有引用的数组被拷贝，其值不会解除引用。对于数组传值给函数也是如此\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$b&nbsp;=&nbsp;100;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$a&nbsp;=&nbsp;array(\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;a&#39;&nbsp;=&gt;&nbsp;&amp;$b,\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#39;b&#39;&nbsp;=&gt;&nbsp;&#39;c&#39;,\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$c&nbsp;=&nbsp;$a;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$c[&#39;a&#39;]&nbsp;=&nbsp;200;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var_dump($a);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//如果对一个未定义的变量进行引用赋值、引用参数传递或引用返回,则会自动创建该变量。\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;function&nbsp;foo(&amp;$var)&nbsp;{&nbsp;}\n\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foo($a);&nbsp;//&nbsp;$a&nbsp;is&nbsp;&quot;created&quot;&nbsp;and&nbsp;assigned&nbsp;to&nbsp;null\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$b&nbsp;=&nbsp;array();\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foo($b[&#39;b&#39;]);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var_dump(array_key_exists(&#39;b&#39;,&nbsp;$b));&nbsp;//&nbsp;bool(true)\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$c&nbsp;=&nbsp;new&nbsp;StdClass;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foo($c-&gt;d);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var_dump(property_exists($c,&nbsp;&#39;d&#39;));&nbsp;//&nbsp;bool(true)</pre><p>&nbsp;&nbsp;&nbsp;&nbsp;函数参数的引用传递:<br/></p><pre class=\"brush:php;toolbar:false\">&nbsp;&nbsp;&nbsp;&nbsp;&lt;?php&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;function&nbsp;test(&amp;$var){\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$var&nbsp;=&nbsp;$var&nbsp;+&nbsp;100;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$a&nbsp;=&nbsp;10;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;test($a);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$a;//110\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;传址和传值大家都应该熟悉吧,呵呵.\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;解释:函数调用时,就相当于给变量内容10取了个别名$var,所以里面改变会影响到函数外面\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注意:\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;不能像这样传递&nbsp;test(&amp;$a)\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;test(1)\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;看不懂,看看上面的解释\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3&nbsp;如果使用call_user_func_array,是要这样的\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;call_user_func_array(&#39;test&#39;,&nbsp;array(&amp;$a));</pre><p>&nbsp;&nbsp;&nbsp;&nbsp;函数的引用返回:<br/></p><pre class=\"brush:php;toolbar:false\">&nbsp;&nbsp;&nbsp;&nbsp;&lt;?php\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;function&nbsp;&amp;test(){\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;static&nbsp;$a&nbsp;=&nbsp;10;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$a&nbsp;=&nbsp;$a&nbsp;＋&nbsp;1;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$a;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$a;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$b&nbsp;=&nbsp;test();\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$b;//11\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$b&nbsp;=&nbsp;15;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;test();//12&nbsp;&nbsp;$b改变并没有改变$a\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$c&nbsp;=&nbsp;&amp;test();\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$c&nbsp;&nbsp;&nbsp;//13\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$c&nbsp;=&nbsp;20;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;test();//21&nbsp;&nbsp;这次改变了,不知道你注意到区别了吗,\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如果我们使用$b&nbsp;=&nbsp;test();&nbsp;就跟普通的是一样的,函数的引用返回必须要加&amp;,至于什么\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;原因,php给的是&quot;引用返回用在当想用函数找到引用应该被绑定在哪一个变量上面时&quot;,我\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;是看不懂,大家按着例子意会一下吧.</pre><p>&nbsp;&nbsp;&nbsp;&nbsp;如果实在看不懂上面也没有关系的,因为函数引用大多数都用在对象上,<br/></p><pre class=\"brush:php;toolbar:false\">&nbsp;&nbsp;&nbsp;&nbsp;&lt;?php\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;class&nbsp;test{\n\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;private&nbsp;$data&nbsp;=&nbsp;&#39;Hi&#39;;\n\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;&amp;&nbsp;get(){\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;$this-&gt;data;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\n&nbsp;&nbsp;&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;out(){\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$this-&gt;data;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;\n\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\n\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$test&nbsp;=&nbsp;new&nbsp;test();\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data&nbsp;=&nbsp;&amp;$test-&gt;get();\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$test-&gt;out();\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data&nbsp;=&nbsp;&#39;How&nbsp;&#39;&nbsp;;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$test-&gt;out();\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data&nbsp;=&nbsp;&#39;Are&nbsp;&#39;;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$test-&gt;out();\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data&nbsp;=&nbsp;&#39;You&#39;;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$test-&gt;out();\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//Hi&nbsp;How&nbsp;Are&nbsp;You\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$data是对象$test的变量$test-&gt;data的别名,所以改变$data就改变了对象的属性,即使是\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;私有属性.(小小的安全问题)</pre><p>&nbsp;&nbsp;&nbsp;&nbsp;对象的引用:<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;php5中,对象的赋值默认是引用,不是复制<br/></p><pre class=\"brush:php;toolbar:false\">&nbsp;&nbsp;&nbsp;&nbsp;&lt;?php&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;class&nbsp;test{\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;$a&nbsp;=&nbsp;1;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$t1&nbsp;=&nbsp;new&nbsp;test();\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$t2&nbsp;=&nbsp;$t1;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$t2-&gt;a;//1\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$t2-&gt;a&nbsp;=&nbsp;2;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$t1-&gt;a//2;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;会互相影响的\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如果要实现复值,则重写__clone()方法吧,这个应该了解吧\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;php低于版本5的是复值,而不是引用.</pre><p>&nbsp;&nbsp;&nbsp;&nbsp;$this永远是引用<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;php中对于地址的指向（类似指针）功能不是由用户自己来实现的，是由Zend核心实现</p><p>&nbsp;&nbsp;&nbsp;&nbsp;的,php中引用采用的是“写时拷贝”的原理，就是除非发生写操作，指向同一个地址的</p><p>&nbsp;&nbsp;&nbsp;&nbsp;变量或者对象是不会被拷贝的.</p><pre class=\"brush:php;toolbar:false\">&nbsp;&nbsp;&nbsp;&nbsp;&lt;?\n&nbsp;&nbsp;&nbsp;&nbsp;$a=&quot;ABC&quot;;\n&nbsp;&nbsp;&nbsp;&nbsp;$b=&amp;$a;\n&nbsp;&nbsp;&nbsp;&nbsp;此时,$a和$b(不是内容&#39;ABC&#39;)是同一个地址,\n&nbsp;&nbsp;&nbsp;&nbsp;$a&nbsp;=&nbsp;&#39;edf&#39;;\n&nbsp;&nbsp;&nbsp;&nbsp;此时,zend会自动为$b(不是内容&#39;edf&#39;)申请一块内存进行存储,也就是说在发生写操作之前$a和$b&nbsp;&nbsp;&nbsp;&nbsp;本省是在一起的.(不知道大家明不明白呢?)</pre><p>&nbsp;&nbsp;&nbsp;&nbsp;看下面:<br/></p><pre class=\"brush:php;toolbar:false\">&nbsp;&nbsp;&nbsp;&nbsp;&lt;?php&nbsp;$a&nbsp;=&nbsp;array(&#39;a&#39;,&#39;c&#39;...&#39;n&#39;);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$b&nbsp;=&nbsp;$a;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/*&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如&nbsp;果程序仅执行到这里，$a和$b是相同的，但是并没有像C那样，$a和$b占用不同的\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;内存空间，而是指向了同一块内存，这就是php和c的差别，并不需要&nbsp;写成$b=&amp;$a\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;才表示$b指向$a的内存，zend就已经帮你实现了引用，并且zend会非常智能的帮\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;你去判断什么时候该这样处理，什么时候不&nbsp;该这样处理。\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如果在后面继续写如下代码，增加一个函数，通过引用的方式传递参数，并打印\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;输出数组大小&nbsp;&nbsp;&nbsp;\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//引用传递\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;function&nbsp;printA(&amp;$arr)&nbsp;{\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;print(count($arr));\n\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;printA($a);\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/*此时程序会认为这种行为会改变$a的值,因为前面$b=$a,不是引用赋值,索引会自动为\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$b申请申请一块内容,并把数据复制一份,赋给$b.\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;加入不是引用传递,而是普通传递.则不会发生写时拷贝\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;两种函数的写法对性能是不一样的,大家测测,来个1000次循环,呵呵\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;所以不要滥用传址.\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/</pre><p>&nbsp;&nbsp;&nbsp;&nbsp;总结下引用的引用:</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&nbsp;允许用两个变量来指向同一个内容.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&nbsp;用引用传递变量.这是通过在函数内建立一个本地变量并且该变量在呼叫范围内引用</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;了同一个内容来实现的</p><p>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;3 引用返回<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;上面都有例子,就不举例吧,没事多看看手册<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"http://www.php.net/manual/zh/language.references.whatare.php\" style=\"color: rgb(120, 175, 211); font-family: &#39;black Verdana&#39;, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);\">http://www.php.net/manual/zh/language.references.whatare.php</a></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=\"http://www.php.net/manual/zh/language.references.whatdo.php\" style=\"color: rgb(120, 175, 211); font-family: &#39;black Verdana&#39;, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);\">http://www.php.net/manual/zh/language.references.whatdo.php</a></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=\"http://www.php.net/manual/zh/language.references.pass.php\" style=\"color: rgb(120, 175, 211); font-family: &#39;black Verdana&#39;, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);\">http://www.php.net/manual/zh/language.references.pass.php</a></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=\"http://www.php.net/manual/zh/language.references.return.php\" style=\"color: rgb(120, 175, 211); font-family: &#39;black Verdana&#39;, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 21px; white-space: normal; background-color: rgb(255, 255, 255);\">http://www.php.net/manual/zh/language.references.return.php</a></p>',0,0,'','PHP'),(4,'Memcached的安装及使用','王雷鸣',7,0,1421806747,1421811935,1,'<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;memcached是高性能的分布式内存缓存服务器,通过缓存数据库查询结果,减少数据库访问次数,以此提高web应用的性能.<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;特点:<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;协议简单<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;基于libevent的事件处理<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;内置内存存储方式<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;采用不互相通信的分布式<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Memcached是以守护进程的方式运行于一个或者多个服务器中,随时接受客户端的链接,链接建立后,就是存取对象了,每个被存储的对象都有一个唯一标识符与之相关联,保存在Memcached的对象实际上是存放在内存中的,这也是Memcached如此高校的原因之一.需要注意的是,memcached并没有提供持久化的策略,服务停止后,所有存储的数据都会丢失.</p><p>安装Memcached服务器:</p><p>&nbsp;&nbsp;&nbsp;&nbsp;必须首先安装依赖库libevent.<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;wget <a href=\"http://www.monkey.org/~provos/libevent-1.2.tar.gz(可安装更高的版本)\" _src=\"http://www.monkey.org/~provos/libevent-1.2.tar.gz(可安装更高的版本)\">http://www.monkey.org/~provos/libevent-1.2.tar.gz(可安装更高的版本)</a></p><p>&nbsp; &nbsp; &nbsp; &nbsp; tar zxvf libevent-1.2.tar.gz</p><p>&nbsp; &nbsp; &nbsp; &nbsp; cd libevent-1.2</p><p>&nbsp; &nbsp; &nbsp; &nbsp; ./configure –prefix=/usr/libevent</p><p>&nbsp; &nbsp; &nbsp; &nbsp; make &amp;&amp; make install<br/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; 检测是否安装成功,&nbsp;ls -al /usr/lib | grep libevent</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;安装memcached<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;wget&nbsp;<a href=\"http://www.danga.com/memcached/dist/memcached-1.2.1.tar.gz\" _src=\"http://www.danga.com/memcached/dist/memcached-1.2.1.tar.gz\">http://www.danga.com/memcached/dist/memcached-1.2.1.tar.gz</a> </p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tar &nbsp;-zxvf memcached-1.2.1.tar.gz<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cd &nbsp; &nbsp;memcached-1.2.1.tar.gz</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;./configure -prefix=/usr/memcached<br/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; make &amp;&amp; make install</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 如果安装过程中有错误,网上解决错误的文章很多的,大家可以参考下.<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sudo ln -s /usr/local/memcached/bin/memcached /usr/bin memcached<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;启动 memcached -d -m 128 -u root -p 11211<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;下面是memcached的常用启动选项<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><table><tbody><tr class=\"firstRow\"><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">选项</td><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">描述</td></tr><tr><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">-d</td><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">以守护(daemon)程序的方式运行Memcached</td></tr><tr><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">-m</td><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">设置Memcached可以使用的内存大小,单位为MB</td></tr><tr><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">-l</td><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">设置监听的地址,如果是本机的话,可以不用设置</td></tr><tr><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">-p</td><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\"><p>设置监听端口,默认为11211,可以不设置</p></td></tr><tr><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">-u</td><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">指定用户,如果当前为root,需要使用此参数指定用户</td></tr><tr><td valign=\"top\" colspan=\"1\" rowspan=\"1\" style=\"word-break: break-all;\">-c</td><td valign=\"top\" colspan=\"1\" rowspan=\"1\" style=\"word-break: break-all;\">最大连接数,默认1024,可根据自身需要进行调整</td></tr><tr><td valign=\"top\" colspan=\"1\" rowspan=\"1\" style=\"word-break: break-all;\">-P</td><td valign=\"top\" colspan=\"1\" rowspan=\"1\" style=\"word-break: break-all;\">保存memcached运行时的pid文件的位置</td></tr></tbody></table><p>除了上面常用的选项为外,还有很多,可以通过以下命令查看memcached -h<br/></p><p><br/></p><p>客户端安装,其实就是php的扩展的安装,网上有很多我就不具体说了.</p><p>客户端可以分为是两种,memcached和memcache区别:</p><table><tbody><tr class=\"firstRow\"><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">memcache</td><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">memcached</td></tr><tr><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">原生版本(php内置的),完全在php框架内开发的</td><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">基于libmemcached,功能更全<br/></td></tr><tr><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">支持OO和非OO两套接口<br/></td><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">仅支持OO接口</td></tr><tr><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">配置一般通过ini文件或者ini_set()函数<br/></td><td width=\"346\" valign=\"top\" style=\"word-break: break-all;\">还可以通过实例的setOptions()进行设置<br/></td></tr><tr><td valign=\"top\" colspan=\"1\" rowspan=\"1\" style=\"word-break: break-all;\">不支持二进制协议,支持长连接<br/></td><td valign=\"top\" colspan=\"1\" rowspan=\"1\" style=\"word-break: break-all;\">支持二进制协议,性能更高,不支持长连接</td></tr></tbody></table><p>更多区别可参照:<a href=\"http://code.google.com/p/memcached/wiki/PHPClientComparison\" _src=\"http://code.google.com/p/memcached/wiki/PHPClientComparison\">http://code.google.com/p/memcached/wiki/PHPClientComparison</a> </p><p>还有一种就是大家比较关心的就是算法:普通hash和一致性hash,具体算法实现我们不展开讨论,网上多的是,大家自己看看.这里介绍下memcache和memcached怎么样配置支持一致性hash<br/></p><p>memcache</p><p>&nbsp;&nbsp;&nbsp;&nbsp;修改ini文件<br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Memcache.allow_failover = 1</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Memcache.hash_strategy =consistent&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Memcache.hash_function =crc32</p><p>&nbsp;&nbsp;&nbsp;&nbsp;ini_set():</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ini_set(‘memcache.hash_strategy&#39;,&#39;standard&#39;);</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; ini_set(‘memcache.hash_function&#39;,&#39;crc32&#39;);</p><p>memcached: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p>&nbsp; &nbsp; $m = new memcached();&nbsp;</p><p>&nbsp; &nbsp; $m-&gt;setOption(Memcached::OPT_DISTRIBUTION,Memcached::DISTRIBUTION_CONSISTENT);&nbsp;</p><p>&nbsp; &nbsp; $m-&gt;setOption(Memcached::OPT_LIBKETAMA_COMPATIBLE,true);</p><p><br/></p><p>各自的函数可以参考函数手册:</p><p>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"http://cn2.php.net/manual/zh/book.memcache.php\" _src=\"http://cn2.php.net/manual/zh/book.memcache.php\">http://cn2.php.net/manual/zh/book.memcache.php</a> </p><p>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"http://cn2.php.net/manual/zh/book.memcached.php\" _src=\"http://cn2.php.net/manual/zh/book.memcached.php\">http://cn2.php.net/manual/zh/book.memcached.php</a> </p><p>其实还有一种客户端的形式,就是,加入web服务器不是你所能控制的,不允许你安装memcache扩展,怎么办呢?我们可以使用memcache_client.php</p><p>下载地址:<a href=\"http://www.danga.com/memcached/dist/memcached-1.2.0.tar.gz\" _src=\"http://www.danga.com/memcached/dist/memcached-1.2.0.tar.gz\">http://phpca.cytherianage.net/memcached/dist/memcached-client-php-0.1.2.tar.gz</a> </p><p><br/></p><p>查看内存分配情况:memcached -u root -vv</p><p><br/></p>',0,0,'','缓存'),(5,'nodejs中exports与module.exports详解','王雷鸣',8,0,1423459827,1423459827,1,'<p><br/></p><p>module.exports是真正的接口,exports是module.exports的工具.换句话说,挂载到module.exports上的东西定义的是一个类或者类型,exports就是经过new的一个&quot;实例化&quot;对象.</p><p>如果module.exports上面已经挂载了数据,那么exports上面的挂载的东西将全部失效.</p><p>挂载到exports上面的数据最终会挂载到module.export是上面.</p>',0,0,'','nodejs'),(6,'一个页面上引入多个版本的jQuery','王雷鸣',9,0,1425102871,1425103110,1,'<p>如何在一个页面上让多个jQuery共存呢？比如jquery-1.5和jquery-1.11。</p><p>你可能会问,干嘛引入多个版本的jQuery呢,使用最新的不就可以了嘛?<br/></p><p>下面我们举一个例子:</p><p>现有网站使用了很多基于jquery-1.5的插件,如果直接更新jquery的版本,就会导致插件无法工作,当然我们也可以把插件也更新,如果有的话,总之是各种的麻烦.</p><p>我们可以通过jQuery的noConflict()来让多版本共存。</p><p>当我们导入jQuery时,jQuery仅向window这个全局变量注入两个变量:</p><p>window.$ = window.jQuery = {jQuery, jQuery};</p><p>同时,jQuery内部保留旧的window.$和window.jQuery对象的引用,当我们调用</p><p>var $jq = $.noConflict();</p><p>window.$被恢复,但是window.jQuery还是新版本的.</p><p>当我们调用:<br/></p><p>var $jq = $.noConflict(true);</p><p>window.$和window.jQuery都变成了老版本的.</p><p>此时可以通过$jq使用新版本的jQuery和$.<br/></p><pre class=\"brush:js;toolbar:false;\">&lt;script&nbsp;src=&quot;jquery-1.5.js&quot;&gt;&lt;/script&gt;\n&lt;script&nbsp;src=&quot;jquery-1.11.js&quot;&gt;&lt;/script&gt;\n&lt;script&gt;\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;现在window.$和window.jQuery是1.11版本:\n&nbsp;&nbsp;&nbsp;&nbsp;console.log($().jquery);&nbsp;//&nbsp;=&gt;&nbsp;&#39;1.11.0&#39;\n&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;$jq&nbsp;=&nbsp;jQuery.noConflict(true);\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;现在window.$和window.jQuery被恢复成1.5版本:\n&nbsp;&nbsp;&nbsp;&nbsp;console.log($().jquery);&nbsp;//&nbsp;=&gt;&nbsp;&#39;1.5.0&#39;\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;可以通过$jq访问1.11版本的jQuery了\n&lt;/script&gt;\n&lt;script&nbsp;src=&quot;myscript.js&quot;&gt;&lt;/script&gt;</pre><p>在myscript.js中可以使用$jq使用新版本的jQuery.</p><p>但是这样会把页面的js的代码搞的乱七八糟的,不明白的人很容易出错.<br/></p><p>最好的办法是不改动页面的js代码,直接编写我们自己的js文件,如myscript.js<br/></p><pre class=\"brush:js;toolbar:false\">&lt;script&nbsp;src=&quot;jquery-1.5.js&quot;&gt;&lt;/script&gt;\n&lt;script&nbsp;src=&quot;myscript.js&quot;&gt;&lt;/script&gt;</pre><p>这样我们在myscript.js内部引用新版本的jQuery,与外界无关.<br/></p><p>确定文件的主体:</p><pre class=\"brush:js;toolbar:false\">//&nbsp;myscript.js\n(function&nbsp;()&nbsp;{\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;BEGIN\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;TODO:&nbsp;javascript&nbsp;code&nbsp;here...\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;END\n})();</pre><p>用匿名函数是个好习惯,不污染全局变量,同时不允许外部代码访问.<br/></p><pre class=\"brush:js;toolbar:false\">//&nbsp;myscript.js\n(function&nbsp;()&nbsp;{\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;BEGIN\n&nbsp;&nbsp;&nbsp;&nbsp;/*!&nbsp;jQuery&nbsp;v1.11.1&nbsp;*/\n&nbsp;&nbsp;&nbsp;&nbsp;!function(a,b){&quot;object&quot;==typeof&nbsp;module&amp;&amp;&quot;object&quot;==typeof&nbsp;module.exports?...\n&nbsp;&nbsp;&nbsp;&nbsp;if(k&amp;&amp;j[k]&amp;&amp;(e||j[k].data)||void&nbsp;0!==d||&quot;string&quot;!=typeof&nbsp;b)return&nbsp;k||(k=...\n&nbsp;&nbsp;&nbsp;&nbsp;},cur:function(){var&nbsp;a=Zb.propHooks[this.prop];return&nbsp;a&amp;&amp;a.get?a.get(thi...\n\n&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;$&nbsp;=&nbsp;jQuery.noConflict(true);\n\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;TODO:&nbsp;javascript&nbsp;code&nbsp;here...\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;END\n})();</pre><p>嵌入的是压缩后的js代码.这里$是一个局部变量哦.</p><p>最后一步工作就是检查jQuery的协议是否允许我们把jQuery的源码直接嵌入到我们自己的js文件中.<br/></p>',0,0,'','JavaScript');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `upid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `pinyin` varchar(255) NOT NULL DEFAULT '',
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  `status` int(10) unsigned NOT NULL DEFAULT '1',
  `created_time` int(11) DEFAULT NULL,
  `updated_time` int(11) DEFAULT NULL,
  `pname` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `upid` (`upid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (5,0,'PHP','php',0,1,1421332017,1421332017,''),(6,0,'Mysql','mysql',0,1,1421332034,1421332034,''),(7,0,'缓存','cache',0,1,1421657806,1421657806,''),(8,0,'nodejs','node',0,1,1423458812,1423458812,''),(9,0,'JavaScript','js',0,1,1425101902,1425101902,'');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `upid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pinyin` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  `status` int(10) unsigned NOT NULL DEFAULT '1',
  `created_time` int(11) DEFAULT NULL,
  `updated_time` int(11) DEFAULT NULL,
  `pname` varchar(255) CHARACTER SET utf8 DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (3,0,'首页','index',0,1,1421309711,1421309711,'');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(30) NOT NULL,
  `password` char(32) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL COMMENT '真实姓名',
  `mobile` char(15) DEFAULT NULL COMMENT '电话',
  `status` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '状态0删除1正常',
  PRIMARY KEY (`uid`),
  KEY `username` (`username`,`status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'wlm131127@163.com','53e6e850f20964e61cfa42057505cd10','0713','王雷鸣','18310397925',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-11 18:52:18

