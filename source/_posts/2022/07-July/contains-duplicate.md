---
extends: _layouts.post
section: content
title: Contains duplicate
problemUrl: https://leetcode.com/problems/contains-duplicate/
date: 2022-07-10
categories: [array-and-hashmap]
---

We are given a list of integers. We have to find out whether we have any duplicate or not. We can store the elements in a hashset while iterating through the list. We the item is already present in the hashset then we immediately return `true` as we already have duplicate. If we finish the iteration of the whole list, that means we don't have any duplicate, so we return `false`.

```python
class Solution:
def containsDuplicate(self, nums: List[int]) -> bool:
    hashset = set()
    for i in range(len(nums)):
        if nums[i] in hashset:
            return True
        hashset.add(nums[i])
    return False
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`