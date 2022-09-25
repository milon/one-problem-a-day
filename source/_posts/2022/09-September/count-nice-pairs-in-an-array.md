---
extends: _layouts.post
section: content
title: Count nice pairs in an array
problemUrl: https://leetcode.com/problems/count-nice-pairs-in-an-array/
date: 2022-09-25
categories: [array-and-hashmap]
---

The problem statement says `nums[i] + rev(nums[j]) == nums[j] + rev(nums[i])` is the defination of nice pairs. This can also be restated as `nums[i] - rev(nums[i]) == nums[j] - rev(nums[j])`. We will use this formula, and add the difference in a lookup table. And then just like the two sum problem, we will look for a matching pair on lookup hashmap, and add it to our result. Finally, we will return that in the result by moduling the given value `10^9+7`.

```python
class Solution:
    def countNicePairs(self, nums: List[int]) -> int:
        MOD = 10 ** 9 + 7
        res = 0
        lookup = collections.defaultdict(int)
        for num in nums:
            diff = num - int(str(num)[::-1])
            res += lookup[diff]
            lookup[diff] += 1
        return res % MOD
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
