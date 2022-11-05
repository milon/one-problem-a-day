---
extends: _layouts.post
section: content
title: Majority element
problemUrl: https://leetcode.com/problems/majority-element/
date: 2022-11-05
categories: [array-and-hashmap]
---

We can count all element in the array, and return the element that has the most count.

```python
class Solution:
    def majorityElement(self, nums: List[int]) -> int:
        count = collections.defaultdict(int)
        for num in nums:
            count[num] += 1
        return max(count, key=count.get)
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`

