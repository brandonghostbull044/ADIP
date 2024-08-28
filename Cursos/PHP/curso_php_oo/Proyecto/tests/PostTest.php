<?php



use PHPUnit\Framework\TestCase;
use APP\Post;
use APP\Comment;

class PostTest extends TestCase
{
    public function test_add_commet_to_post()
    {
        $post = new Post();
        $comment = new Comment();

        $post->addComment($comment);

        $this->assertEquals(1, $post->countComments());
        $this->assertInstanceOf(Comment::class, $post->getComments()[0]);
    }
}

echo "Esto funciona";


?>