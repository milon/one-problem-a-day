---
extends: _layouts.post
section: content
title: Meeting rooms II
problemUrl: https://leetcode.com/problems/meeting-rooms-ii/
date: 2022-07-23
categories: [intervals]
---

We will sort the intervals, then in each iteration we will compare the end of the meeting with the start of the previous meeting. We will keep track of the count for the number of meeting going on, and another running counter to keep track of the max meeting room. After the iteration is done, we return the maximum meeting room.

```python

```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`