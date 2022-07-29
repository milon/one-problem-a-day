---
extends: _layouts.post
section: content
title: Longest consecutive sequence
problemUrl: https://leetcode.com/problems/longest-consecutive-sequence/
date: 2022-07-29
categories: [array-and-hashmap]
---

We will first create a set with the input numbers, so we can look up in the set with constant time. Then we iterate over the numbers, check if the current number has any predecisior, if not that means it's a start of a sequence. Then we look forward for the rest of the sequence and count the length. We will also keep track of a running longest length, when one sequence is done, we will compare the length with the longest to store the maximum value. After the iteration over the whole input numbers are done, we return the longest value as result.

```python
class Solution:
    def longestConsecutive(self, nums: List[int]) -> int:
        numSet = set(nums)
        longest = 0
        
        for n in nums:
            if (n-1) not in numSet:
                length = 0
                while (n+length) in numSet:
                    length += 1
                longest = max(length, longest)
        
        return longest
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`