---
extends: _layouts.post
section: content
title: Number of pairs of strings with concatenation equal to target
problemUrl: https://leetcode.com/problems/number-of-pairs-of-strings-with-concatenation-equal-to-target/
date: 2022-08-20
categories: [array-and-hashmap]
---

First we will count the number of frequency of each elements of the input. Then iterate over all possible slices of target and multiply by the count and add it to our final result. If some slices are missing in frequency array, it will return 0, so that doesn't contribute to our result, that means we can ignore any checks. Finally we will return the result.

```python
class Solution:
    def numOfPairs(self, nums: List[str], target: str) -> int:
        count = collections.Counter(nums)
        res = 0
        for i in range(1, len(target)):
            if i == len(target)-i and target[:i] == target[i:]:
                res += count.get(target[:i], 0) * (count.get(target[:i], 0)-1)
            else:
                res += count.get(target[:i], 0) * count.get(target[i:], 0)
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`