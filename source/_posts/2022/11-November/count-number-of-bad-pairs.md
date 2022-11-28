---
extends: _layouts.post
section: content
title: Count number of bad pairs
problemUrl: https://leetcode.com/problems/count-number-of-bad-pairs/
date: 2022-11-28
categories: [dynamic-programming]
---

Rather counting the number of bad pair, we can count the number of good pair and substruct it from to total number of pairs to get the number of bad pairs. For an array of size n, there are exactly n * (n - 1) / 2 unique pairs (i, j) where i < j. We get this from the sum of i from i = 1 to i = n.

Then, consider the equation, j - i = nums[j] - nums[i]. The fact that we have two unique indices i, j on both sides of this equation is frustrating. It'd be easier if we could consider them individually. So, let's rearrange the equation using basic algebra: j - nums[j] = i - nums[i].

Now the problem is reducible to the classic two-sum problem. For each index i and element nums[i], figure out what i - nums[i] is. If we have seen this difference before, we can make a "non-bad" pair with it.

```python
class Solution:
    def countBadPairs(self, nums: List[int]) -> int:
        total = len(nums) * (len(nums)-1)//2
        good, dp = 0, collections.defaultdict(int)
        
        for i,num in enumerate(nums):
            v = i-num
            good += dp[v]
            dp[v] += 1
        
        return total - good
```

Time complexity: `O(n)`, n is the length of the `nums` <br/>
Space complexity: `O(n)`