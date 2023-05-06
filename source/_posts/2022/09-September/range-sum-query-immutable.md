---
extends: _layouts.post
section: content
title: Range sum query immutable
problemUrl: https://leetcode.com/problems/range-sum-query-immutable/
date: 2022-09-13
categories: [design]
---

We will store the nums as a class property and each time there is a query, we sum up the range in between and return the result.

```python
class NumArray:
    def __init__(self, nums: List[int]):
        self.nums = nums

    def sumRange(self, left: int, right: int) -> int:
        return sum(self.nums[left:right+1])

# Your NumArray object will be instantiated and called as such:
# obj = NumArray(nums)
# param_1 = obj.sumRange(left,right)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`

We can also use a prefix sum array to store the sum of the prefix of the array. Then, we can just return the difference between the prefix sum of the right index and the prefix sum of the left index-1.

```python
class NumArray:
    def __init__(self, nums: List[int]):
        self.prefix_sum = [0]
        for num in nums:
            self.prefix_sum.append(self.prefix_sum[-1] + num)

    def sumRange(self, left: int, right: int) -> int:
        return self.prefix_sum[right+1] - self.prefix_sum[left]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`