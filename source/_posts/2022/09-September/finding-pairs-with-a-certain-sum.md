---
extends: _layouts.post
section: content
title: Finding pairs with a certain sum
problemUrl: https://leetcode.com/problems/finding-pairs-with-a-certain-sum/
date: 2022-09-16
categories: [design]
---

We will create 2 counter for both nums1 and nums2 and also we will keep track of nums2. Every time we add something, we increase the value in nums2, and update the counter. The for count, we will iterate over every item in nums1 counter and match it with nums2 counter and if we find a match we multiply it with the number of elements and return the sum of these elements.

```python
class FindSumPairs:
    def __init__(self, nums1: List[int], nums2: List[int]):
        self.counter1 = collections.Counter(nums1)
        self.counter2 = collections.Counter(nums2)
        self.nums2 = nums2

    def add(self, index: int, val: int) -> None:
        self.counter2[self.nums2[index]] -= 1
        self.nums2[index] += val
        self.counter2[self.nums2[index]] += 1

    def count(self, tot: int) -> int:
        return sum(self.counter2.get(tot-k, 0) * v for k, v in self.counter1.items())

# Your FindSumPairs object will be instantiated and called as such:
# obj = FindSumPairs(nums1, nums2)
# obj.add(index,val)
# param_2 = obj.count(tot)
```

Time Complexity: `O(n+m)`, n is the size if nums1, m is the size if nums2 <br/>
Space Complexity: `O(n+m)`