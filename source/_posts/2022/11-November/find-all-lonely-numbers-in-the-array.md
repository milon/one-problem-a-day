---
extends: _layouts.post
section: content
title: Find all lonely numbers in the array
problemUrl: https://leetcode.com/problems/find-all-lonely-numbers-in-the-array/
date: 2022-11-30
categories: [array-and-hashmap]
---

We will count the occurrences of each number in the array and return the numbers that have only one occurrence and no adjacent number is present in the list.

```python
class Solution:
    def findLonely(self, nums: List[int]) -> List[int]:
        count = collections.Counter(nums)
        res = []
        for num, cnt in count.items():
            if cnt == 1 and num+1 not in count and num-1 not in count:
                res.append(num)
        return res         
```

Time complexity: `O(n)`, n is the length of the array <br/>
Space complexity: `O(n)`