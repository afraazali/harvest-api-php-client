<?php
/**
 * CurrentUserTest class.
 */

namespace Required\Harvest\Tests\Api;

use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use Required\Harvest\Api\CurrentUser;
use Required\Harvest\Api\CurrentUser\ProjectAssignments;

/**
 * Tests for current user endpoint.
 */
#[AllowMockObjectsWithoutExpectations]
class CurrentUserTest extends TestCase {

	/**
	 * Returns the class name the test case is for.
	 *
	 * @return string Class name.
	 */
	protected function getApiClass(): string {
		return CurrentUser::class;
	}

	/**
	 * Test retrieving the current user.
	 */
	public function testShow() {
		$expectedArray = $this->getFixture( 'current-user' );

		$api = $this->getApiMock();
		$api->expects( $this->once() )
			->method( 'get' )
			->with( '/users/me' )
			->willReturn( $expectedArray );

		$this->assertEquals( $expectedArray, $api->show() );
	}

	/**
	 * Test API interface for project assignments.
	 */
	public function testProjectAssignments() {
		$api = $this->getApiMock();

		$this->assertInstanceOf( ProjectAssignments::class, $api->projectAssignments() );
	}
}
