---
extends: _layouts.post
section: content
title: Divide array into equal pairs
problemUrl: https://leetcode.com/problems/divide-array-into-equal-pairs/
date: 2022-10-30
categories: [array-and-hashmap]
---

We can use a hashmap to store the frequency of each element in the array. Then we can iterate over the array and check if the frequency of the current element is even or not. If it is even, we can divide it by 2 and add it to the result. If it is odd, we can return false.

```python
class Solution:
    def divideArray(self, nums: List[int]) -> bool:
        count = collections.Counter(nums)
        for num in count.values():
            if num % 2 != 0:
                return False
        return True
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`